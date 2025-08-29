 <?php include 'header.php'; ?>
 <style>
  body{
    background:rgb(14, 14, 14);  /* ← ici tu peux changer le 1px selon l’épaisseur souhaitée */
;
  }
   
    
.Mr1 {
display: flex;
 justify-content: center;
margin-top: 30px; 
margin-left: 45vh;
}
.Mr1 .Mr2{
  
}
.Mr2{
  width: 50%;
  gap:10PX;
 
}
.Mr2 .casep{

  padding: 15px;
  
}
.casep div{
  width: 50%;
  height: 80px;
   display: flex;
  background: none;
  border: 1px solid #ffffff;  /* ← ici tu peux changer le 1px selon l’épaisseur souhaitée */
  padding: 8px 16px;
  color: #ffffff;
  font-size: 16px;
  cursor: pointer;
  border-radius: 25px;
  align-items: center;     /* Centre verticalement */
  justify-content: center; 
    
   
}
.casep {
  
    justify-content: center;
    display: flex;
    gap:4px;
    
}
.casep div a {
 text-decoration: none;
 color:rgb(238, 0, 255);
}
.img2{
  height: 70vh;
  width: 35vh;
}
.imgdiv{
  width: 60%;
  height: 100%;
   display: flex;
  justify-content: center;      /* centre horizontalement */
  align-items: flex-end;        /* colle en bas */
                /* ou toute autre hauteur */
       /* optionnel */
}
.imgdiv{
 justify-content: center; 
  align-items: center; 
 
}
.info{
  height: 100%;
  width: 100%;
  margin-top: 10vh; 
}
.contact-form{
  margin-left: 25vh;
  margin-right: 25vh;
}
.butt2{
  color:white;
  background-color:black;
  border-radius: 25px;
justify-content: center;
width: 10vw;
height: 6vh;
}
.casep2 {
  padding: 8px 16px;
}




@media screen and (max-width: 1024px) {
  .Mr1 {
    flex-direction: column;
    margin: 30px auto;
    align-items: center;
    width: 80%;
  }

  .Mr2 {
    width: 90%;
    margin-bottom: 20px;
  }

  .img2 {
    width: 100%;
    height: auto;
  }

  .contact-form {
    margin: 0 5vw;
  }

  .butt2 {
    width: 50%;
    height: auto;
    padding: 10px;
  }

  .casep {
    flex-wrap: wrap;
    gap: 8px;
  }

  .casep div {
    width: 90%;
    height: auto;
    padding: 10px;
    font-size: 14px;
  }
}

@media screen and (max-width: 768px) {
  .Mr1 {
    margin: 20px auto;
    padding: 0 10px;
    width: 90%;
  }

  .Mr2 {
    width: 100%;
  }

  .casep div {
    font-size: 13px;
    padding: 8px;
  }

  .butt2 {
    width: 100%;
    font-size: 16px;
  }

  .info {
    margin-top: 5vh;
  }
}
@media screen and (max-width: 1024px) {
  .imgdiv {
    display: none;
  }
}

@media screen and (max-width: 768px) {
  .imgdiv {
    display: none;
  }
}




   
  </style>

<body>
 <div class="Mr1">
  <div class="Mr2">
    <div class="info">
      <div class="casep2">
      <button class="butt2">Nous contacter</button>
    </div>
      
    
    <div class="casep">
      <div>Godwin Dovon</div>
      <div>MDS</div>
    </div>
    <div class="casep">
      <div >+33 6 29 53 65 12</div>
      <div>godwindovon@gmail.com</div>
    </div>
    <div class="casep">
      <div><a href="https://www.linkedin.com/in/godwin-dovon-mess656/">linkedin</a></div>
      <div><a href="https://github.com/DOVONGODWIN">Github</a></div>
    </div>
    </div>
  </div>
  <div class="Mr2">
    <div class="imgdiv">
      <img src="Device.png" alt="" class="img2">
    </div>
   
  </div>

 </div>





<?php include 'footer.php'; ?>