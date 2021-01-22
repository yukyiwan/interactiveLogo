<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<link rel="icon" type="image/x-icon" href = "favicon/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png" />
<link rel="icon" sizes="192x192" href="favicon/android-chrome-192x192.png" /> 
<link rel="icon" sizes="512x512" href="favicon/android-chrome-512x512.png" /> 
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png" />
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png" />
<link rel="manifest" href="favicon/site.webmanifest" />
<meta name="msapplication-TileColor" content="#da532c" />
<meta name="msapplication-TileImage" content="favicon/mstile-150x150.png" />
<meta name="theme-color" content="#ffffff" />
<title>OMG | Home</title>
<script src="https://zimjs.org/cdn/1.3.2/createjs.js"></script>
<script src="https://zimjs.org/cdn/cat/01/zim.js"></script>
<script>
// https://zimjs.com - JavaScript Canvas Framework - Code Creativity!
const assets = ["logofs.png", "setoff.mp3", "jelly.mp3"];
const path = "assets/";
const frame = new Frame("logo", 500, 500, 0, null, assets,path);
frame.on("ready", () => {
    const stage = frame.stage;
    let stageW = frame.width;
    let stageH = frame.height;

    // put your code here
    
    const artBoard = new Container().pos(10,10);
    const bg = new Rectangle(400,400,0).addTo(artBoard);
    const logo = asset ("logofs.png").sca(0.28).centerReg();

    if (mobile()){
      Ticker.add(()=>{
         const logo = asset ("logofs.png").sca(0.3).centerReg();   
      }); 
    }
    
    //change color
    logo.on("mouseover", e=>{
    const bg2=new Rectangle (400,400).addTo(artBoard);
    rHex(bg2);

    artBoard.centerReg().animate({props:{alpha:1},
    time:1
    });
    });

    //Change background to rainbow
    logo.on("click", e=>{
    const rR = rand(2,9);
    const bar = new Rectangle (400,400/rR);
    const rainbow = new Tile (bar,1,rR,0,0).addTo(artBoard);
    rainbow.loop(bar=>{
    rHex(bar);
    });

    artBoard.centerReg().animate({props:{rotation:[90,180]},
    time:1
    });
    });

    //change background to Montage

    artBoard.on("click", e=>{
    const rS = rand(2,8);
    const square = new Rectangle (400/rS,400/rS);
    const montage = new Tile (square,rS,rS,0,0).addTo(artBoard);
    montage.loop(square=>{
    rHex(square)
    });

    artBoard.centerReg().animate({props:{alpha:1},
    time:1
    });
    });

    //change borderColor

    artBoard.on("mouseover", e=>{
    const bg2=new Rectangle (400,400,0,0,15).addTo(artBoard);
    bHex(bg2);

    artBoard.centerReg().animate({props:{alpha:1},
    time:1
    });
    });

    if (mobile()) {

      logo.on("pressmove", e=>{
        const bg2=new Rectangle (400,400).addTo(artBoard);
        rHex(bg2);

        artBoard.centerReg().animate({props:{alpha:1},
        time:1
        });
        });

      artBoard.on("pressmove", e=>{
        const bg2=new Rectangle (400,400,0,0,15).addTo(artBoard);
        bHex(bg2);

        artBoard.centerReg().animate({props:{alpha:1},
        time:1
        });
        });

    }

    function rHex(shape) {
    let pantone = "#";
    const codes = ["a","b","c","d","e","f","0","1","2","3","4","5","6","7","8","9"];
    loop(6, i=>{
    pantone += shuffle(codes)[0]});
    shape.color=pantone}

    function bHex(shape) {
    let pantone = "#";
    const codes = ["a","b","c","d","e","f","0","1","2","3","4","5","6","7","8","9"];
    loop(6, i=>{
    pantone += shuffle(codes)[0]});
    shape.borderColor=pantone}
            
    const pPoints=[[-82.1,17.6,0,0,0,0,0,0,"none"],[25.7,17.4,0,0,0,0,0,0,"none"],[64.5,46.4,0,0,-0.4,-32.2,0.4,32.2,"none"],[25,74.1,0,0,0,0,0,0,"none"],[-79.3,73.9,0,0,0,0,0,0,"none"],[-179.7,243.6,0,0,0,0,0,0,"none"],[-220.3,242.9,0,0,0,0,0,0,"none"],[-159.9,72.2,0,0,0,0,0,0,"none"],[-336.5,72.1,0,0,0,0,0,0,"none"],[-357.2,105,0,0,0,0,0,0,"none"],[-399.3,106.8,0,0,0,0,0,0,"none"],[-372.8,44.5,0,0,0,0,0,0,"none"],[-406.5,-16.5,0,0,0,0,0,0,"none"],[-362.8,-15.3,0,0,0,0,0,0,"none"],[-335.9,14,0,0,0,0,0,0,"none"],[-160.1,18.4,0,0,0,0,0,0,"none"],[-228.2,-165.6,0,0,0,0,0,0,"none"],[-190.4,-167.1,0,0,0,0,0,0,"none"]];
    const plane = new Blob({color:white,borderColor:clear, borderWidth:100,points:pPoints,interactive:false}).alp(0).centerReg();
    const track = new Blob({radius:180, color:clear,borderColor:white,borderWidth:5,points:"circle", dashed: true, selectColor:clear})
            .center()
            .top().alp(0);
            
    logo.on("dblclick", e => {   
        asset("setoff.mp3").play();
        plane.alp(1).sca(.12).addTo().animate({props:{path:track}, time:2, loop:true, ease:"linear"});  
         track.alp(1).centerReg().animate({
              props:[
                {props:{shape:new Blob({points:"rectangle", radius:180})}},
                {props:{shape:new Blob({points:"circle", radius:180})}}],
              time:1,
              loop:true,
              loopCount:1
           });
        artBoard.setMask(null);
        
    });

    artBoard.on("dblclick", e => {   
        asset("jelly.mp3").play();
        track.alp(0).centerReg().animate({
              props:{shape:new Blob({points:"rectangle", radius:190})},
              time:1,
              rewind:true,
              loop:true,
              loopCount:1
           });
        artBoard.setMask(track);
       
    });    
    
    // track.on("dblclick", e => {   
    //     track.alp(0);
    //     plane.alp(0);
    //     artBoard.setMask(null);
    // });  
    
    stage.update();
});

</script>
<meta name="viewport" content="width=device-width, user-scalable=no" />
<link href="main.css" rel="stylesheet"/>
</head>
<body>
    <section id="logo"></section>
        <main>
            <h1>Interactive anything...Starts here...</h1>
            <p>Welcome and enjoy our interactive logo!</p>
            <ol>
                <li>Click, doubleclick, mouseover or pressmove on the logo to hunt down the hidden effects.</li>
                <li>Loop over the entire HEX library to choose your favorite colors.</li>
                <li>You are GREAT to get 5 and a GENIUS if you discover more than 8!</li>
                <li><a style ="color:#006266; text-decoration: underline" href="logo.html">Create</a> your own OMG logo now!</li>
            </ol>
    </main> 
   
   <?php include("includes/footer.php"); ?>
</body>
</html>
