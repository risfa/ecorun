<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Wheel of Fortune Bingo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style type="text/css">
    text{
        font-family:Helvetica, Arial, sans-serif;
        font-size:11px;
        pointer-events:none;
    }
    #chart{
        position:absolute;
        width:500px;
        height:500px;
        top:0;
        left:0;
    }
    #question{
        position: absolute;
        width:400px;
        height:500px;
        top:0;
        left:520px;
    }
    #question h1{
        font-size: 50px;
        font-weight: bold;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        position: absolute;
        padding: 0;
        margin: 0;
        top:50%;
        -webkit-transform:translate(0,-50%);
                transform:translate(0,-50%);
    }

/*    .merah{
        background: red;
        height: 20px;
    }
    .biru{
        background: blue;
        height: 20px;
    }*/

    #chart{
        margin-left:4.7vw;
        margin-top: 1%;
    }
    </style>

</head>
<body style="background-image: url('aset/ECO_RUN2.jpg'); background-repeat: no-repeat; background-position: center; background-size:100% 2500px;">
  <br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h2>AYO CEK KEBERUNTUNGANMU DISINI!</h2>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 "></div>
            <div class="col-sm-6 ">
                <center>
                    <div id="chart"></div>
                </center>
            </div>
            <div class="col-md-3 "></div>
        </div>
    </div>
    <div style="position:fixed; left:38%; bottom:22%;">
      <h1 id="hadiah_show" style="margin-left:-100px; display:none;"></h1>
      <br><br>
        <button  style="display:none;" type="button" name="button" id="button_succes" ><h1>Ambil Hadiah<h1></button>

            <!-- class="btn btn-info" -->
    </div>
    <div style="display: none;" id="question"><h1></h1></div>
    <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
    $('#button_succes').click(function(){
      window.location.href = 'regist_2.php';
    })



    // get hadiah aja

    // $.get("get_hadiah.php", function(data, status){
    //
    //
    //   fortune(data);
    // });

    // end



        var padding = {top:20, right:40, bottom:0, left:0},
            w = 500 - padding.left - padding.right,
            h = 500 - padding.top  - padding.bottom,
            r = Math.min(w, h)/2,
            rotation = 0,
            oldrotation = 0,
            picked = 100000,
            oldpick = [],
            color = d3.scale.category20();//category20c()
            //randomNumbers = getRandomNumbers();
        //http://osric.com/bingo-card-generator/?title=HTML+and+CSS+BINGO!&words=padding%2Cfont-family%2Ccolor%2Cfont-weight%2Cfont-size%2Cbackground-color%2Cnesting%2Cbottom%2Csans-serif%2Cperiod%2Cpound+sign%2C%EF%B9%A4body%EF%B9%A5%2C%EF%B9%A4ul%EF%B9%A5%2C%EF%B9%A4h1%EF%B9%A5%2Cmargin%2C%3C++%3E%2C{+}%2C%EF%B9%A4p%EF%B9%A5%2C%EF%B9%A4!DOCTYPE+html%EF%B9%A5%2C%EF%B9%A4head%EF%B9%A5%2Ccolon%2C%EF%B9%A4style%EF%B9%A5%2C.html%2CHTML%2CCSS%2CJavaScript%2Cborder&freespace=true&freespaceValue=Web+Design+Master&freespaceRandom=false&width=5&height=5&number=35#results


        // kaos fastron 20
        // gantungan kunci 100
        // kaos enduro 10
        // kaos enduro sahabat matic 15
        // bulpen 100
        // tumbler 30

        var data = [
                    // {"label":"Kaos Fastron",  "value":100,  "question":"What CSS property is used for specifying the area between the content and its border?"}, // padding
                    // {"label":"Kaos Enduro",  "value":100,  "question":"What CSS property is used for changing the font?"}, //font-family
                    {"label":"Tumbler",  "value":100,  "question":"What CSS property is used for changing the color of text?"}, //color
                    {"label":"Kaos Enduro Sahabat Matic",  "value":100,  "question":"What CSS property is used for changing the color of text?"}, //color
                    {"label":"Bolpoint",  "value":100,  "question":"What CSS property is used for changing the color of text?"},
                    {"label":"Gantungan Kunci",  "value":100,  "question":"What CSS property is used for changing the boldness of text?"} //font-weight
                  ];

        var svg = d3.select('#chart')
            .append("svg")
            .data([data])
            .attr("width",  w + padding.left + padding.right)
            .attr("height", h + padding.top + padding.bottom);
        var container = svg.append("g")
            .attr("class", "chartholder")
            .attr("transform", "translate(" + (w/2 + padding.left) + "," + (h/2 + padding.top) + ")");
        var vis = container
            .append("g");

        var pie = d3.layout.pie().sort(null).value(function(d){return 1;});
        // declare an arc generator function
        var arc = d3.svg.arc().outerRadius(r);
        // select paths, use arc generator to draw
        var arcs = vis.selectAll("g.slice")
            .data(pie)
            .enter()
            .append("g")
            .attr("class", "slice");

        arcs.append("path")
            .attr("fill", function(d, i){ return color(i); })
            .attr("d", function (d) { return arc(d); });
        // add the text
        arcs.append("text").attr("transform", function(d){
                d.innerRadius = 0;
                d.outerRadius = r;
                d.angle = (d.startAngle + d.endAngle)/2;
                return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius -10) +")";
            })
            .attr("text-anchor", "end")
            .attr("style", "font-size: 14px")

            .text( function(d, i) {
                return data[i].label;
            });
        container.on("click", spin);
        function spin(d){


            container.on("click", null);
            //all slices have been seen, all done
            console.log("OldPick: " + oldpick.length, "Data length: " + data.length);
            if(oldpick.length == data.length){
                console.log("done");
                container.on("click", null);
                return;
            }
            var  ps       = 360/data.length,
                 pieslice = Math.round(1440/data.length),
                 rng      = Math.floor((Math.random() * 1440) + 360);

            rotation = (Math.round(rng / ps) * ps);

            picked = Math.round(data.length - (rotation % 360)/ps);
            picked = picked >= data.length ? (picked % data.length) : picked;
            if(oldpick.indexOf(picked) !== -1){
                d3.select(this).call(spin);
                return;
            } else {
                oldpick.push(picked);
            }
            rotation += 90 - Math.round(ps/2);

            vis.transition()
                .duration(3000)
                .attrTween("transform", rotTween)
                .each("end", function(){


                    $('#button_succes').css('display','block');
                    $('#hadiah_show').css('display','block');
                    $('#hadiah_show').html('Selamat Anda Mendapatkan ' + data[picked].label);


                    //mark question as seen
                    d3.select(".slice:nth-child(" + (picked + 1) + ") path")
                        .attr("", "");
                    //populate question
                    d3.select("#question h1")
                        .text(data[picked].question);
                    oldrotation = rotation;

                    container.on("click", spin);

                });
                console.log(data[picked].label);

                $.get("update_hadiah.php?idtrx=<?php echo $_GET['idtrx'];?>&hadiahnya="+data[picked].label, function(data, status){

                  // alert(data);
                });


        }
        //make arrow
        svg.append("g")
            .attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h/2)+padding.top) + ")")
            .append("path")
            .attr("d", "M-" + (r*.15) + ",0L0," + (r*.05) + "L0,-" + (r*.05) + "Z")
            .style({"fill":"black"});
        //draw spin circle
        container.append("circle")
            .attr("cx", 0)
            .attr("cy", 0)
            .attr("r", 60)
            .style({"fill":"white","cursor":"pointer"});
        //spin text
        container.append("text")
            .attr("x", 0)
            .attr("y", 15)
            .attr("text-anchor", "middle")
            .text("SPIN")
            .style({"font-weight":"bold", "font-size":"30px"});


        function rotTween(to) {
          var i = d3.interpolate(oldrotation % 360, rotation);
          return function(t) {
            return "rotate(" + i(t) + ")";
          };
        }


        function getRandomNumbers(){
            var array = new Uint16Array(1000);
            var scale = d3.scale.linear().range([360, 1440]).domain([0, 100000]);
            if(window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function"){
                window.crypto.getRandomValues(array);
                console.log("works");
            } else {
                //no support for crypto, get crappy random numbers
                for(var i=0; i < 1000; i++){
                    array[i] = Math.floor(Math.random() * 100000) + 1;
                }
            }
            return array;
        }


    </script>
</body>
</html>
