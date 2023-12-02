const canvas = document.getElementById('canvaCert');
const ctx = canvas.getContext('2d');
const image = new Image();


$(document).ready(function(){
    var CursoDetalleID = getUrlParameter('CursoDetalleID');

    $.post("../../controller/usuario.php?op=mostrar_CursoDetalle",{CursoDetalleID: CursoDetalleID}, function(data) {
        data= JSON.parse(data);
        image.src = data.Curso_img;
        ctx.drawImage(image,0,0, canvas.width, canvas.height);
        ctx.font='45px Time new Roma';
        ctx.textAlign = 'center';
        ctx.fillStyle='#063D86'
        ctx.textBaseline = 'middle';
        var x = canvas.width/2;
        ctx.fillText(data.usu_Nombre+' '+data.usu_Apellido_P+' '+data.usu_Apellido_M,x,455);
        ctx.font='20px Time new Roma';
        ctx.fillText(data.Titulo,x+25,572);
        ctx.fillText('Fecha De Inicio: '+data.Fecha_Ini,x-180,615);
        ctx.fillText('Fecha De Finalización: '+data.Fecha_Fin,x+185,615);
        ctx.fillText(data.ins_Nombre+' '+data.ins_Apellido_P+' '+data.ins_Apellido_M,x,770);
        $('#Descripcion').html(data.Descripcion);
    });

});

window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}

$(document).on("click",'#btn_png', function() {
    let lblpng = document.createElement('a');
    lblpng.download=data.Curso_img;
    lblpng.href= canvas.toDataURL();
    lblpng.click();
});


$(document).on("click",'#btn_pdf', function() {
    var imgData = canvas.toDataURL('image/png');
    var pdf = new jsPDF('l','mm',[352,240]);
    pdf.height="150px";
    pdf.addImage(imgData,'PNG',15,7);
    pdf.save('Certificado.pdf');
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};