let namaorang = document.getElementById('nama');
let hasil = document.getElementById('hasilnama');

namaorang.addEventListener('input', function(){
    let benar=false;
    for(i=0; i<namaorang.value.length; i++){
        if(namaorang.value[i] >= 0 && namaorang.value[i] <= 9){
            benar=true;
            break;
        }
    }
    hasil.textContent = benar ? "Tidak boleh terdapat angka" : " ";
});

let email=document.getElementById('email');
let hasilemail=document.getElementById('hasilemail');
 
let sandi = document.getElementById('sandi');
let hasilsandi = document.getElementById('hasilsandi');

sandi.addEventListener('input', function(){
    let ada=false;
    for(i=0; i<sandi.value.length; i++){
        if(sandi.value[i] < sandi.value[5]){
            ada=true;
            break;
        }
    }
    hasilsandi.textContent = ada ? " " : "Sandi minimal 6 huruf";
});

document.getElementById('signup').addEventListener('click', function(){
    if((hasilsandi.textContent != " ")||(hasil.textContent != " ")){
        alert("Ulang bos!!");
    } else {
        alert("Berhasil daftar");
        href="signin.php";
    }
});

document.getElementById('signup').addEventListener('mouseover', function(){
    document.getElementById('signup').style.backgroundColor = 'gray';
});

document.getElementById('signup').addEventListener('mouseout', function(){
    document.getElementById('signup').style.backgroundColor = 'black';
});

