$(document).ready(function(){
    $('#rwCat0').change(function(){
        if(this.checked){
            alert("checked");
            $('#rwMarker_construction').fadeIn('slow');
        }else{
            alert("unchecked");
            $('#rwMarker_construction').fadeOut('slow');
        }
    });

    $('#rwCat1').change(function(){
        if(this.checked){
            $('#rwMarker_rehabilitation').fadeIn('slow');
            //$('#autoUpdate').fadeIn('slow');
        }else{
            //$('#autoUpdate').fadeOut('slow');
        }
    });

    /*$('#rwCat2').change(function(){
        if(this.checked){
            $('#rwMarker_renovation').fadeIn('slow');
            //$('#autoUpdate').fadeIn('slow');
        }else{
            //$('#autoUpdate').fadeOut('slow');
        }
    });

    $('#rwCat3').change(function(){
        if(this.checked){
            $('#rwMarker_riprapping').fadeIn('slow');
            //$('#autoUpdate').fadeIn('slow');
        }else{
            //$('#autoUpdate').fadeOut('slow');
        }
    });

    $('#rwCat4').change(function(){
        if(this.checked){
            $('#rwMarker_application').fadeIn('slow');
            //$('#autoUpdate').fadeIn('slow');
        }else{
            //$('#autoUpdate').fadeOut('slow');
        }
    });

    $('#rwCat5').change(function(){
        if(this.checked){
            $('#rwMarker_installation').fadeIn('slow');
            //$('#autoUpdate').fadeIn('slow');
        }else{
            //$('#autoUpdate').fadeOut('slow');
        }
    });

    $('#rwCat6').change(function(){
        if(this.checked){
            $('#rwMarker_reconstruction').fadeIn('slow');
            //$('#autoUpdate').fadeIn('slow');
        }else{
            //$('#autoUpdate').fadeOut('slow');
        }
    });

    $('#rwCat7').change(function(){
        if(this.checked){
            $('#rwMarker_concreting').fadeIn('slow');
            //$('#autoUpdate').fadeIn('slow');
        }else{
            //$('#autoUpdate').fadeOut('slow');
        }
    });

    $('#rwCat8').change(function(){
        if(this.checked){
            $('#rwMarker_electrification').fadeIn('slow');
            //$('#autoUpdate').fadeIn('slow');
        }else{
            //$('#autoUpdate').fadeOut('slow');
        }
    });

    $('#rwCat9').change(function(){
        if(this.checked){
            $('#rwMarker_lighting').fadeIn('slow');
            //$('#autoUpdate').fadeIn('slow');
        }else{
            //$('#autoUpdate').fadeOut('slow');
        }
    });*/

});