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
      <div>ANGERS 49100</div>
      <div>16 Rue du Maine </div>
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