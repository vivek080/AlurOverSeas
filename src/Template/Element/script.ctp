<script type="text/javascript">

$(document).ready(function(){

    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')); ?>;
    $.ajax({
          url:"<?= $this->Url->build("categories/getcategories"); ?>",

          // $this->request(['controller' => 'categories', 'action' => 'getcategories']);
          // $this->Auth->allow(['controller' => 'pages', 'action' => 'display', 'home']);
          type: "post",
          dataType: "json",
          headers: {
               'X-CSRF-Token': csrfToken
           },
           // console.log("categories data==",data);
          success: function(data){
            // console.log("categories data==",data);
            // var obj=$.parseJSON(data);
            var htmltext ='';

            htmltext +="<div class='row'>";
            // var i = 0;
            $.each(data,function(key,value)
            {
              // if(i%3 == 0){
              //   htmltext += "<div class='col-md-4'>";
              // }
              htmltext += "<div class='col-md-4 table4' style='justify-content:center; text-align:center'><a href='categories/view/"+value.id+"'><img class='img1 img-fuild' src="+value.path+" style='width:300px; height: 175px;'></img></a><br><h4 class='text12' >"+value.name+"</h4><br><br></div>";

              // if(i%2 == 2){
              // }
              // i++;
            });
            // htmltext +="<br><br>";
            htmltext +="</div>";
            $('.display1').append(htmltext);

          },
         //error: function(){alert('Error');}
         error:function(xhrErr){console.log("Errror count=",xhrErr.responseText)}
       });

       $("#contact-btn").on("click", function(){
          var form = $('#form-contact');
          var formData = $(form).serialize();
          console.log("formData==",formData);
         $.ajax({
           url:"<?php echo $this->Url->build("users/getSaveContactDetails.json"); ?>",
           type: "post",
           data: formData,
           dataType: "json",
           headers: {
             'X-CSRF-Token': csrfToken
           },
           // console.log("categories data==",data),
           success: function(data){
             // alert(data);
             console.log("Contact data==",data);
             if(data.status){

               // $(alert($data['message']);
               $("#alert").addClass("alert-success");
               $("#alert").removeClass("alert-danger");
               $('#contact-name').val("");
               $('#contact-email').val("");
               $('#contact-mobile').val("");
               $('#contact-message').val("");
             }else{

               $("#alert").removeClass("alert-success");
               $("#alert").addClass("alert-danger");
             }
             $("#alert").html(data.message);

           },
           //error: function(){alert('Error');}
           error:function(xhrErr){console.log("Errror count=",xhrErr.responseText)}
         });
       });


});

// $(function sendContact() {
//           var csrfToken = ;
//
//           $.ajax({
//             url: "contact/getcontact",
//             data:'userName='+$("#userName").val()+'&userEmail='+
//             $("#userEmail").val()+'&subject='+
//             $("#subject").val()+'&content='+
//             $(content).val(),
//             type: "POST",
//             success:function(data){
//                 $("#mail-status").html(data);
//             },
//             error:function (){}
//         });
// });



</script>
