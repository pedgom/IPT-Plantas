<?php
view()->share('pageTitle', __('Dashboard'));
view()->share('hideToolbar', true);
?>
<x-base-layout>
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
                font-family: 'Poppins', sans-serif;
            }

            .base{
                display:flex;
                justify-content:center;
                align-items:center;
                margin-top: 30px;
                margin-left: 330px;
                width:600px;
                height:100px;
                background: transparent;
            }

            #time{
                display:flex;
                gap: 40px;
                color: #fff;
            }

            #time .hour{
                position: relative;
                display: block;
                width: 100px;
                height: 80px;
                background: #00b300;
                color:#fff;
                font-weight:300;
                display:flex;
                justify-content: center;
                align-items: center;
                font-size: 3em;
                z-index: 10;
                box-shadow: 0 0 0 1px rgba(0,0,0,.2);

            }


            #time .minute{
                position: relative;
                display: block;
                width: 100px;
                height: 80px;
                background: #f2d024;
                color:#fff;
                font-weight:300;
                display:flex;
                justify-content: center;
                align-items: center;
                font-size: 3em;
                z-index: 10;
                box-shadow: 0 0 0 1px rgba(0,0,0,.2);
            }

            #time .second{
                position: relative;
                display: block;
                width: 100px;
                height: 80px;
                background: #b11f1f;
                color:#fff;
                font-weight:300;
                display:flex;
                justify-content: center;
                align-items: center;
                font-size: 3em;
                z-index: 10;
                box-shadow: 0 0 0 1px rgba(0,0,0,.2);
            }

            #time .ap{
                position: relative;
                display: block;
                width: 100px;
                height: 80px;
                background: #000000;
                color:#fff;
                font-weight:300;
                display:flex;
                justify-content: center;
                align-items: center;
                font-size: 1.5em;
                z-index: 10;
                box-shadow: 0 0 0 1px rgba(0,0,0,.2);
            }









        </style>

    </head>


    <div style="margin-left:auto; margin-right:auto;display: block;width:70%; background:#00b300; border-radius: 253px">
        <img  style="display: block;margin-left:auto; margin-right:auto; width:50%;}"alt="Logo" src="{{asset('images/logo.svg')}}" />

    </div>

    <div class="base">


        <div id="time">
            <div class="hour">
                <div id="hours">00</div>
            </div>
            <div class="minute">
                <div id="minutes">00</div>
            </div>
            <div class="second">
                <div id="seconds">00</div>
            </div>
            <div class="ap">
                <div id="ampm">AM</div>
            </div>

        </div>

        <script>
            setInterval(() => {
                let hours = document.getElementById('hours');
                let minutes = document.getElementById('minutes');
                let seconds = document.getElementById('seconds');
                let ampm = document.getElementById('ampm');

                let h = new Date().getHours();
                let m = new Date().getMinutes();
                let s = new Date().getSeconds();
                let am = h >= 12 ? "PM" : "AM";

                if(h > 12){
                    h = h -12;
                }

                h= (h < 10) ? "0" + h : h;
                m= (m < 10) ? "0" + m : m;
                s= (s < 10) ? "0" + s : s;


                hours.innerHTML = h;
                minutes.innerHTML = m;
                seconds.innerHTML = s;
                ampm.innerHTML = am;
            })

        </script>
    </div>






</x-base-layout>
