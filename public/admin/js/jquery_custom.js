$(document).ready(function(){
   $("#formaction").hide();
   $("a.addcate").click(function(){
        $("#formaction").stop().slideToggle();
   }); 
   $("#formaction #ok").click(function(){
        ca=$("#cate").val();
        na=$("#txtcate").val();
        if(na==""){
            $("#mess_form").html("<ul><li>Vui lòng nhập dữ liệu vào trường Categorie !</li></ul>").addClass("mess_errors");
        }else{
            $.ajax({
                "url": baseUrl+"admin/categorie/add",
                "type": "post",
                "data":"name="+na+"&cate="+ca,
                "async" :true,
                "success":function(kq){
                    if(kq == 1){
                        $("#mess_form").html("<ul><li>Vui lòng nhập dữ liệu vào trường Categorie !</li></ul>").addClass("mess_errors");
                    }else{
                        alert(kq);
                        $("#formaction").fadeOut(200);
                        $("#mess_form").html("&nbsp;").removeClass("mess_errors");
                        $("#txtcate").val("");
                        reloadData();
                    }
                }
                
            });
        }
        return false;
   });
});

function reloadData(){
    $("#recordData").load(baseUrl+"admin/categorie/reload");
}