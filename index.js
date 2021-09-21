document.querySelector(".load-files-ajax").addEventListener("click", () => {
    let formdata = new FormData()
    formdata.append("fetch_all_files", "")
    fetch('./db_request.php', {
        method: 'POST',
        body: formdata
    }).then(res => res.json()).then(data => {
        // console.log(Array.isArray(data.data));
        document.querySelector(".ajax-files-container").innerHTML = ""
        data.data.map(file => {
            let fileContainer = document.createElement("div")
            fileContainer.setAttribute("style", "width: 25%; margin: 10px;")
            let fileEl = ""
            if (file.type.split("/")[0] == "image") {
                fileEl = `<img src="./uploads/${file.filename}" style="width:100%; height: 100%;" alt="">`
                
            }else if (file.type.split("/")[0] == "application") {
                fileEl = `
                PDF File
                `
                fileContainer.setAttribute("style", `width: 25%; margin: 10px; background-color: tomato; 
                display: flex; justify-content: center; align-items: center; `)
            }else{
                fileEl = `<video style="width: 100%">
                            <source src="./uploads/${file.filename}" type="${file.type}">
                        </video>`
            }
            fileContainer.innerHTML = fileEl

            document.querySelector(".ajax-files-container").append(fileContainer)
        //     <div style="width: 25%; margin: 10px;">
        //     <img src="./uploads/img3.jpg" style="width:100%; height: 100%;" alt="">
        // </div>
        })
    })
})


document.querySelector(".load-visible-files-with-ajax").addEventListener("click", () => {
    let formdata = new FormData()
    formdata.append("fetch_visible_files", "")
    fetch('./db_request.php', {
        method: 'POST',
        body: formdata
    }).then(res => res.json()).then(data => {
        // console.log(Array.isArray(data.data));
        document.querySelector(".ajax-files-container").innerHTML = ""
        data.data.map(file => {
            let fileContainer = document.createElement("div")
            fileContainer.setAttribute("style", "width: 25%; margin: 10px;")
            let fileEl = ""
            if (file.type.split("/")[0] == "image") {
                fileEl = `<img src="./uploads/${file.filename}" style="width:100%; height: 100%;" alt="">`
                
            }else if (file.type.split("/")[0] == "application") {
                fileEl = `
                PDF File
                `
                fileContainer.setAttribute("style", `width: 25%; margin: 10px; background-color: tomato; 
                display: flex; justify-content: center; align-items: center; `)
            }else{
                fileEl = `<video style="width: 100%">
                            <source src="./uploads/${file.filename}" type="${file.type}">
                        </video>`
            }
            fileContainer.innerHTML = fileEl

            document.querySelector(".ajax-files-container").append(fileContainer)
        //     <div style="width: 25%; margin: 10px;">
        //     <img src="./uploads/img3.jpg" style="width:100%; height: 100%;" alt="">
        // </div>
        })
    })
})