
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
  <body style="background-image: url({{$course->certified_image}});
       background-size: 100%;
       background-image-resize: 6;
       font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
       ">

      <div style="width:72%; float: left; margin-left: 50px; margin-top: 50px;">
        <div style="  text-align: center; font-size: 20px;">
          <h1 style="color: #b42d7e">{{$course->certified_title}}</h1>
        </div>
        <div style="  text-align: center; font-size: 20px">
          <p>{{$course->certified_header}}</p>
        </div>

        @if ($number == 1 || $number == 2 || $number == 3)
          <div style=" text-align: center;  padding-top: 2em">
            <h2 style=" margin-bottom: 10px">{{$user->name}} {{$user->last_name}}</h2>
            <h3 style=" margin-top: 15px">{{$user->type_dni}}. {{$user->dni}}</h3>
          </div>

        @endif

        @if ($number == 4 || $number == 5 || $number == 6)
          <div style=" text-align: center;">
            <h2 style=" margin-bottom: 10px">{{$user->name}} {{$user->last_name}}</h2>
            <h3 style=" margin-top: 15px">{{$user->type_dni}}. {{$user->dni}}</h3>
          </div>

        @endif

        @if ($number == 1 || $number == 2 || $number == 3)
          <div style=" text-align: center; font-size: 20px; padding-top: 3em">
            <p>Aprobó el {{$course->type}} de <strong>"{{$course->title}}"</strong> con una duración de ({{$course->duration}}) {{$course->duration_type}}.</p>
          </div>
        @endif

        @if ($number == 4 || $number == 5 || $number == 6)
          <div style=" text-align: center; font-size: 20px;">
            <p>Aprobó el {{$course->type}} de <strong>"{{$course->title}}"</strong> con una duración de ({{$course->duration}}) {{$course->duration_type}}.</p>
          </div>
        @endif



        @if ($number == 1)
          <div style="margin-top: 5em">
              <div style=" width:30%;  text-align: center; float: left;">
              </div>
            <div style=" width:30%;  text-align: center; float: left; margin-left: 35%">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people1}}</h4>
              <p style="margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people1}}</p>
            </div>
            <div style=" width:30%;  text-align: center; float: right">
            </div>
          </div>
        @endif

        @if ($number == 2)
          <div style="margin-top: 5em">
              <div style=" width:30%;  text-align: center; float: left;">
                <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people1}}</h4>
                <p style="margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people1}}</p>
              </div>
            <div style=" width:30%;  text-align: center; float: left; margin-left: 35%">
            </div>
            <div style=" width:30%;  text-align: center; float: right">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people2}}</h4>
              <p style="margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people2}}</p>
            </div>
          </div>
        @endif

        @if ($number == 3)
          <div style="margin-top: 5em">
              <div style=" width:30%;  text-align: center; float: left;">
                <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849" >{{$course->certified_name_people1}}</h4>
                <p style="margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people1}}</p>
              </div>
            <div style=" width:30%;  text-align: center; float: left; margin-left: 35%">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people2}}</h4>
              <p style="margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people2}}</p>
            </div>
            <div style=" width:30%;  text-align: center; float: right">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people3}}</h4>
              <p style="margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people3}}</p>
            </div>
          </div>
        @endif
        @if ($number == 4)
          <div style="margin-top: 4em">
              <div style=" width:30%;  text-align: center; float: left;">
                <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849" >{{$course->certified_name_people1}}</h4>
                <p style="margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people1}}</p>
              </div>
            <div style=" width:30%;  text-align: center; float: left; margin-left: 35%">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people2}}</h4>
              <p style="padding-bottom: 1em; margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people2}}</p>
              <h4 style=" border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people4}}</h4>
              <p style="margin-top: 0px">{{$course->certified_position_people4}}</p>
            </div>
            <div style=" width:30%;  text-align: center; float: right">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people3}}</h4>
              <p style="margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people3}}</p>
            </div>
          </div>
        @endif
        @if ($number == 5)
          <div style="margin-top: 4em">
              <div style=" width:30%;  text-align: center; float: left;">
                <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849" >{{$course->certified_name_people1}}</h4>
                <p style="padding-bottom: 1em; margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people1}}</p>
                <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people4}}</h4>
                <p  style="margin-top: 0px">{{$course->certified_position_people4}}</p>
              </div>
            <div style=" width:30%;  text-align: center; float: left; margin-left: 35%">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people2}}</h4>
              <p style="margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people2}}</p>
            </div>
            <div style=" width:30%;  text-align: center; float: right">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people3}}</h4>
              <p style="padding-bottom: 1em; margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people3}}</p>
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people5}}</h4>
              <p style="margin-top: 0px">{{$course->certified_position_people5}}</p>
            </div>
          </div>
        @endif
        @if ($number == 6)
          <div style="margin-top: 4em">
              <div style=" width:30%;  text-align: center; float: left;">
                <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849" >{{$course->certified_name_people1}}</h4>
                <p style="padding-bottom: 1em; margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people1}}</p>
                <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people4}}</h4>
                <p  style="margin-top: 0px">{{$course->certified_position_people4}}</p>
              </div>
            <div style=" width:30%;  text-align: center; float: left; margin-left: 35%">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people2}}</h4>
              <p style="padding-bottom: 1em; margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people2}}</p>
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people5}}</h4>
              <p style="margin-top: 0px">{{$course->certified_position_people5}}</p>
            </div>
            <div style=" width:30%;  text-align: center; float: right">
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people3}}</h4>
              <p style="padding-bottom: 1em; margin-top: 0px; margin-bottom: 3em">{{$course->certified_position_people3}}</p>
              <h4 style="border-top: 2px solid #b42d7e; margin-bottom: 0px; color: #ab2849">{{$course->certified_name_people6}}</h4>
              <p style="margin-top: 0px">{{$course->certified_position_people6}}</p>
            </div>
          </div>
        @endif


      </div>
  </body>
</html>
