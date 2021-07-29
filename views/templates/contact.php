<?php
include "header.php"
?>

<div class="container-fluid" id="pageContact">
        <div class="row">
            <div class="pageContact--banner">
               
              <h2>Contacter nous</h2>
                
            </div>
         <div class="col-12 col-md-12  d-flex justify-content-between p-5" >
                <div class="col-12 col-md-8  ">
                  <form method="post" action="">
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Message</label>
                    <textarea class="form-control" name="message" rows="7"></textarea>
                    <div id="messageHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="form-group d-flex justify-content-between" id="contact">
                    <div class="mb-3 col-12 col-md-5">
                    <label for="exampleInputname1" class="form-label">Nom</label>
                    <input type="text" class="form-control col-md-6" name="nom" id="exampleInputname1" aria-describedby="nameHelp">
                    <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3  col-12 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" class="form-control col-md-6" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputsubject1" class="form-label">Objet</label>
                    <input type="email" class="form-control" name="objet" id="exampleInputsubject1" aria-describedby="subjectHelp">
                    <div id="subjectHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <button type="submit" class="btn btn-marron">Submit</button>
                </form>
                </div>
                <div class="col-12 col-lg-4 col-md-12 table-icone" id="table-i">
                   <ul>
                       <li><i class="fas fa-map-marker-alt"></i></li>
                       <li>109 Angle Rues Faubert & Lambert, Pétion-Ville, Haïti</li>
                       <br/>
                       <li><i class="fas fa-phone-square-alt"></i></li>
                       <li> +509 2813-1515</li>
                       <br/>
                       <li><i class="fas fa-envelope"></i></li>
                       <li> patisseriemariebeliard@hotmail.com</li>
                   </ul>
                </div>
              </div>         
           
            <div class="col-md-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.287859282422!2d-72.2907275857012!3d18.51588947415131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb9e87c65cf609b%3A0xf6953252cf05411a!2sP%C3%A2tisserie%20Marie%20Beliard!5e0!3m2!1sfr!2sht!4v1627199501712!5m2!1sfr!2sht" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
</div>



<?php include "footer.php"?>