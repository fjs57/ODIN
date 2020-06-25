function accueil(){
    if(debug) return;
    state = "ac";
    console.log("accueil");
    majEtatPortes();

    interval = setInterval(majEtatPortes,500);

    $(".display-affectations").addClass("d-none");
    $(".display-disposition").addClass("d-none");
    $("#body-container").removeClass("d-none");    
    $("#parametres-container").addClass("d-none");        

}

function disposition(){
    state = "di";
    console.log("diposition");  

    enModif()

    $(".display-affectations").addClass("d-none");
    $(".display-disposition").removeClass("d-none");
    $("#body-container").removeClass("d-none");
    $("#parametres-container").addClass("d-none");        

}

function affectations(){
    state = "af";
    console.log("affectations");

    enModif()

    $(".display-affectations").removeClass("d-none");
    $(".display-disposition").addClass("d-none");
    $("#body-container").removeClass("d-none");
    $("#parametres-container").addClass("d-none");        
}

function parametres(id){
    state = "pa";
    console.log("parametres"); 

    enModif()

    $(".display-affectations").addClass("d-none");
    $(".display-disposition").addClass("d-none");   
    
    $("#body-container").addClass("d-none");    

    $("#parametres-container").removeClass("d-none");  

    switch ($(id)[0]["text"]) {

        case "Portes" :
            console.log("portes");            
            $.ajax({
                url : "./php/tablePortes.php",
                dataType : "html",
                success : function(html){
                    $("#parametres-container")["0"].innerHTML = html;
                }
            });
            break;

        case "Véhicules" : // EN COURS
            console.log("vehicules"); 
            $.ajax({
                url : "./php/tableVehicules.php",
                dataType : "html",
                success : function(html){
                    $("#parametres-container")["0"].innerHTML = html;
                    console.log(html);
                    
                }
            });
            break;

        default :

            break;
    }
    

}

function func(e){
    const id = $(e)["0"].id.split("-");
    const id_vehicule = id[1];
    const commande = id[0];
    
    switch (commande) {
        case "modifier":
            modifier(id_vehicule);
            break;

        case "save":
            save(id_vehicule);
            break;
 
        case "ordre_droite":
            changerOrdre(id_vehicule,"R");
            break;

        case "ordre_gauche":
            changerOrdre(id_vehicule,"L");
            break;
        
        case "card" :
            if(state=="ac") ouvrir(id_vehicule);
            break;

        case "edit_porte" :
            edit_porte(id_vehicule);
            break;

        case "save_porte" :
            save_porte(id_vehicule);
            break;

        case "pick_image" :
            selectImage(e);
            break;
    
        default:
            break;
    }
}

function reloadParamPortes(){
    $("#param-portes").click();
}

function edit_porte(id){
    $(".edit_porte").attr('disabled',true);
    $("#VO-"+id+",#VI-"+id+",#save_porte-"+id).removeAttr('disabled');
}

function save_porte(id){
    const vo = $("#VO-"+id)[0].value;
    const vi = $("#Vi-"+id)[0].value;
    $.post(
        "./ajax/updatePorte.php",
        {
            idp : id,
            vo : vo,
            vi : vi
        },
        function(text){
            retour(text);
            reloadParamPortes();
        }
    );
}

function selectImage(id){
    $(".pick-img").removeClass("btn-primary").addClass("btn-light");
    $(id).addClass("btn-primary image-selected").removeClass("btn-light");
    $("#select_image_save").removeAttr('disabled');
}

function ouvrir(id){
    console.log("ouvrir" + id);
    $.ajax({
        url : "./ajax/getVObyID.php",
        type : "post",
        data : "idv="+id,
        dataType : "json",
        success : function(param){
            $.ajax({
                url : "./ajax/getIPX.php",
                dataType : "json",
                success : function(ipx){
                    $.ajax({
                        url :`http://${ipx.IP}/api/xdevices.json`,
                        dataType : "json",
                        data : `key=${ipx.apikey}&SetVO=${mef(param.VO)}`,
                        success : function(rep){
                            console.log(rep);                             
                        }
                    });
                }
            });    
        }
    });
    
}

function mef(str){
    if(str<10) return "00"+str;
    if(str<100) return "0"+str;
    return str;
}

function modifier(id){
    //console.log(`save-${id}`);
    
    $(`#save-${id}`).removeAttr('disabled');
    $(`#porte-${id}`).removeAttr('disabled');
    $(`.modifier`).attr('disabled',true);

}

function save(id){
    //console.log(`save-${id}`);
    
    $(`.modifier`).removeAttr('disabled');
    $(`#save-${id}`).attr('disabled',true);
    $(`#porte-${id}`).attr('disabled',true);

    const porte = $(`#porte-${id}`)[0].value;
  
    $.post(
        "./ajax/changePorte.php",
        { 
            idv : id,
            idp : porte
        },
        retour,
        'text'
    );

}

function changerOrdre(id,sens){
    //console.log(id);
    //console.log(sens);
    
    
  
    $.post(
        "./ajax/changeOrdre.php",
        { 
            idv : id,
            sens : sens
        },
        retour,
        'text'
    );
    setTimeout(getPageContent,200);

}



function retour(texte){
    if(texte == "2"){
        alertWarning();
    }else if (texte=="1") {
        alertSaveSuccess();
    } else {
        alertSaveFail();
    }
}

function alertSaveSuccess(){
    $("#alert-success-save").removeClass("d-none");
    setTimeout(function(){
        $("#alert-success-save").alert("close");
    },5000);
}

function alertSaveFail(){
    $("#alert-fail-save").removeClass("d-none");
    setTimeout(function(){
        $("#alert-fail-save").alert("close");
    },5000);
}

function alertWarning(){
    $("#alert-warning").removeClass("d-none");
    setTimeout(function(){
        $("#alert-warning").alert("close");
    },5000);
}

function getPageContent(){
    $.ajax({
        url : "./php/body.php",
        dataType : "html",
        success : function(text){
            $("#body-container")[0].innerHTML = text;
            recover();
        }
    });
    
}

function recover(){
    switch (state) {
        case "ac":
            accueil();
            break;
        case "di":
            disposition();
            break;
        case "af":
            affectations();
            break;
        case "pa":
            parametres();
            break;
        default:
            accueil();
            break;
    }
}

function getVIState(){
    get
    $.ajax({
        url :`http://${ipx.IP}/api/xdevices.json`,
        dataType : "json",
        data : `key=${ipx.apikey}&Get=D`,
        success : function(json){
            console.log(json);
            portes = json;
            //majEtatPortes(json);
        }
    });
}

function majEtatPortes(){
    $.ajax({
        url : "./ajax/getIPX.php",
        dataType : "json",
        success : function(ipx){
            $.ajax({
                url :`http://${ipx.IP}/api/xdevices.json`,
                dataType : "json",
                data : `key=${ipx.apikey}&Get=D`,
                success : function(portes){
                    $.ajax({
                        url: "./ajax/getVIbyVehicle.php",
                        dataType : "json",
                        success : function(data){
                            data.forEach(item => {
                                changeStateVehicle(item.ID,portes["D"+item.VI]);
                                //console.log(item.ID,portes["D"+item.VI]);                                
                            });
                        }
                    });
                }
            });
        }
    });
}

function changeStateVehicle(id,ouvert){
    
    if(state=="ac"){
        if(ouvert) {
            $(`#card-${id}`).removeClass("bg-dark");
            $(`.card-vehicle`).removeClass("bg-warning");
            $(`#card-${id}`).addClass("bg-danger");
        } else {
            $(`#card-${id}`).addClass("bg-dark");
            $(`#card-${id}`).removeClass("bg-danger");
            $(`.card-vehicle`).removeClass("bg-warning");       
        }
    }
}

function enModif(){
    //return;
    clearInterval(interval);
    $(`.card-vehicle`).removeClass("bg-dark");
    $(`.card-vehicle`).addClass("bg-primary");
    $(`.card-vehicle`).removeClass("bg-danger");
}

function getIPX(){
    $.ajax({
        url : "./ajax/getIPX.php",
        dataType : "json",
        success : function(json){
            ipx = json;
        }
    });
}


// on lance accueil à l'ouverture du fichier

var state;
var ipx;

var portes;

var interval;

var debug=false;


//getIPX();

accueil();

