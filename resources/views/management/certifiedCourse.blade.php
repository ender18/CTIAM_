
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="css/mycss.css" rel="stylesheet">
    <style>
      @page { margin:0px;}
    </style>
  </head>
  <body style="background-image: url('images/certifieds/certified2.jpg');
       background-size: 100%;
       background-image-resize: 6;
       font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
       ">

      <div style="width:72%; float: left; margin-left: 50px; margin-top: 50px;">
        <div style="  text-align: center; font-size: 20px;">
          <h1 style="color: #b42d7e">CERTIFICADO DE PARTICIPACIÓN</h1>
        </div>
        <div style="  text-align: center; font-size: 20px">
          <p>LA UNIVERSIDAD FRANCISCO DE PAULA SANTANDER Y EL LABORATORIO PUNTO VIVE DIGITAL LAB CERTIFICAN QUE:</p>
        </div>
        <div style=" text-align: center;">
          <h2 style=" margin-bottom: 10px">YESENIA RODRIGUEZ VELAZQUEZ</h2>
          <h3 style=" margin-top: 15px">CC. 1.093.790.367</h3>
        </div>
        <div style=" text-align: center; font-size: 20px">
          <p>Aprobó el curso de <strong>"{{$course->title}}"</strong> con una duración de ({{$course->duration}}) {{$course->duration_type}}.</p>
        </div>
        <div style=" text-align: center; font-size: 20px">
          <p>Aprobó el curso de <strong>"{{$course->title}}"</strong> con una duración de (34) horas.</p>
        </div>

        <div style="margin-top: 2em">
          @if ($course->title == 'Empanaditas1')
            <div style=" width:30%;  text-align: center; float: left;">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849" >HECTOR MIGUEL PARRA LOPEZ</h4>
              <p style="margin-top: 0px; margin-bottom: 3em">Rector UFPS</p>
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">WILLIAM VILLAMIZAR LAGUADO</h4>
              <p  style="margin-top: 0px">Gobernador Norte de Santander</p>
            </div>

          @endif
          <div style=" width:30%;  text-align: center; float: left; margin-left: 35%">
            <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">HECTOR MIGUEL PARRA LOPEZ</h4>
            <p style="margin-top: 0px; margin-bottom: 3em">Rector UFPS</p>
            <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">WILLIAM VILLAMIZAR LAGUADO</h4>
            <p style="margin-top: 0px">Gobernador Norte de Santander</p>
          </div>
          <div style=" width:30%;  text-align: center; float: right">
            <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">HECTOR MIGUEL PARRA LOPEZ</h4>
            <p style="margin-top: 0px; margin-bottom: 3em">Rector UFPS</p>
            <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">WILLIAM VILLAMIZAR LAGUADO</h4>
            <p style="margin-top: 0px">Gobernador Norte de Santander</p>
          </div>
        </div>
      </div>
  </body>
</html>
