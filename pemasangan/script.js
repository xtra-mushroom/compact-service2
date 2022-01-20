let kecamatan = document.getElementById('kecamatan');
let desa = document.getElementById('desa');

kecamatan.addEventListener("change", function(){
    if(!kecamatan.value == ''){
        let xml = new XMLHttpRequest();
        xml.open("GET", "getDesa.php?id_kecamatan=" + kecamatan.value);
        xml.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                desa.innerHTML = '';
                let data = JSON.parse(this.responseText);

                for(let i = 0; i < data.length; i++){
                    let option = document.createElement("option");
                    option.setAttribute("value", data[i].id);
                    option.innerHTML = data[i].nama;
                    desa.insertAdjacentElement("beforeend", option);
                }
            }
        };
        xml.send();
    }
});