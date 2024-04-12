compile_btn = document.getElementById("run");
fileInput = document.getElementById('fileInput');
output_code = document.getElementById("assemblyCode");
copy_btn = document.getElementById("copy_btn");
download_btn = document.getElementById("download_btn");

const mov_regex = /([a-z])=(\d+)/i;
const d = {};
output = "";
firstline = ""
ready = false

mov = 0;
loop_line_nb = 0;
loop=0;
action = ""


function mov_variable(my_str) {
    const lines = my_str.split("\n");

    for (let i = 0; i < lines.length; i++) {
        const line = lines[i];
        if (line.trim() !== '') {
          firstline = line
          ready = true
          ready_number = i + 1; 
          break;
        }
      }
    try{
        if(ready == true && firstline == "#tejhiz"){
            for (let i = ready_number; i < lines.length; i++) {
                while(lines[i] == ''){
                    i++
                }
                if (lines[i] == "#barmajeh"){
                    loop_line_nb = i
                    break
                }
                if (/^(?:\t| {4})/.test(lines[i])){
                    mov_info = lines[i].match(mov_regex);
                    d[`${mov_info[1]}`] = `r${mov}`;
                    output += `mov r${mov}, #${mov_info[2]}\n`;
                    mov++
                } else{
                    alert("error" + lines[i])
                    location.reload();
                    break
                }
            }
            return output
        } else {
            alert("write #tejhiz")
        }
    } catch (error){
        output = ""
        mov=0
        console.log(error)
        return error
    }
}

function for_looping(my_str){
    const lines = my_str.split("\n");
    for (let i = loop_line_nb+1; i < lines.length; i++) {
        if (/^(?:\t| {4})/.test(lines[i])){
            var pattern_loop = /^\s{4}min\s+(\w+)\s*=\s*(\d+)\s+la\s+(\d+):$/;
            var matches_loop = lines[i].match(pattern_loop);
            
            var pattern_info = /^([a-zA-Z])=([a-zA-Z]+|\d+)(\+|\-|\*)([a-zA-Z]+|\d+)$/
            var final_test = lines[i].trim()
            var matches_loop_info = final_test.match(pattern_info);

            if (matches_loop) {
              var variable = matches_loop[1];  // Letter before the equal sign
              var value = matches_loop[2];     // Value after the equal sign
              var number = matches_loop[3];    // Number at the end

            } else if (matches_loop_info){
                first_in_loop = d[matches_loop_info[1]]
                second_in_loop = d[matches_loop_info[2]]
                if(third_in_loop = d[matches_loop_info[4]] != undefined){
                    third_in_loop = d[matches_loop_info[4]]
                }else{
                    third_in_loop = "#" + matches_loop_info[4]
                }


                if(matches_loop_info[3] == "+"){
                    action = "add"
                } else if(matches_loop_info[3] == "-"){
                    action == "sub"
                } else if(matches_loop_info[3] == "*"){
                    action = "mul"
                } else {
                    alert("error")
                }

                if(parseInt(value)>parseInt(number)){
                    action_loop = "sub"
                } else if(parseInt(value)<parseInt(number)){
                    action_loop = "add"
                } else {
                    alert('error')
                }

                return "Loop" + loop +": " + action + " " + first_in_loop + ", " + second_in_loop + ", " + third_in_loop + "\n       " + action_loop + " " + d[variable] + ", " + d[variable] + ", #1\n       cmp " + d[variable]  + ", #" + number + "\n       bne Loop" + loop
            } else {
                console.log(lines[i] + "==")
            }
        } else {
            alert("error")
        }
    }
}



compile_btn.addEventListener('click', function () {
    try{
        code_input = document.getElementById("code_input");
        result = mov_variable(code_input.value);
        result += for_looping(code_input.value);
        output_code.innerHTML = result
        hljs.highlightAll();
        download_btn.style.display = "inline"
        copy_btn.style.display = "inline"
        output_code.scrollIntoView()
    } catch (error){
        console.log(error)
        output_code.innerHTML = ""
    }
})


copy_btn.addEventListener("click", function(){
    navigator.clipboard.writeText(result)
    .then(() => {
    console.log("Text copied to clipboard");
    })
    .catch((err) => {
    console.error("Failed to copy text: ", err);
    });
})



download_btn.addEventListener("click", function(){
    function downloadTextFile(text, fileName) {
        const blob = new Blob([text], { type: "text/plain" });
        const url = URL.createObjectURL(blob);
      
        const a = document.createElement("a");
        a.href = url;
        a.download = fileName;
        a.style.display = "none";
        document.body.appendChild(a);
        
        a.click();
      
        // Clean up
        URL.revokeObjectURL(url);
        document.body.removeChild(a);
      }
      
      const fileName = "output.s";
      
      downloadTextFile(result, fileName);
      
})


fileInput.addEventListener("change", (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.readAsText(file);
    reader.onload = function () {
        code_input.value = reader.result;
    };
});

reader.readAsText(file);