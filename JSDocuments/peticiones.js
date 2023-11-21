document.getElementById("carnetcli").addEventListener("keyup", getCarnets)

function getCarnets(){
    let inputCI= document.getElementById("carnetcli").value
    let lista= document.getElementById("lista")

    let url="JSDocuments/getCarnets.php"
    let formData= new FormData()
    formData.append("carnetcli", inputCI)
    fetch(url,{
        method:"POST",
        body: formData,
        mode:"cors"
    }).then(response => response.json())
    .then(data=>{
        lista.style.display='block'
        lista.innerHTML= data
    })
    .catch(err=>console.log(err))
    }
