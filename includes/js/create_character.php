<?php 
$skillCount         = "1";
$backgroundCount    = "1";
$giftCount          = "1";
$meritCount         = "1";
$flawCount          = "1";
$characterCount     = "1";
$rank               = "0";

if(isset($_GET["skillcount"])){         $skillCount         = $_GET["skillcount"];}
if(isset($_GET["backgroundcount"])){    $backgroundCount    = $_GET["backgroundcount"];}
if(isset($_GET["giftcount"])){          $giftCount          = $_GET["giftcount"];}
if(isset($_GET["meritcount"])){         $meritCount         = $_GET["meritcount"];}
if(isset($_GET["flawcount"])){          $flawCount          = $_GET["flawcount"];}
if(isset($_GET["charactercount"])){     $characterCount     = $_GET["charactercount"];}
if(isset($_GET["rank"])){               $rank               = $_GET["rank"];}
?>



var ccount = <?php echo $charactercount; ?> 
$("#add_character").click(function(){
    
    $(".character_name").select2("destroy");
    var userFields = $("div.character:first").clone(true, true);
    $(userFields).appendTo("div#characters");
    $("div#character").children("div.character:last").children().each(function() {

        if($(this).is("select")){
            $(this).prop('selectedIndex',0);
        }
        if($(this).is("input:text")){
            $(this).val('');
        }
        if($(this).is("input:hidden")){
            $(this).val('');
        }
    });
    $("div.character:last").find("textarea").val("");
    $("div.character:last").find("select").prop('selectedIndex',0);
    $('div.character').each(function(rowIndex){
      /// find each input with a name attribute inside each row
      $(this).find('[name]').each(function(){
        var name;
        
        name = $(this).attr('name');
        name = name.replace(/\[[0-9]+\]/g, '['+rowIndex+']');
        $(this).attr('name',name);
      });
    });
    $('.character_name').select2();
    ccount++;
});

$(".remove_character").click(function(){
    $(this).closest(".character").remove();
})


var count = <?php echo $skillCount; ?>;
var rank = <?php echo $rank; ?>;
$("#add_skill").click(function(){
    $(".skill_name").select2("destroy");
    var userFields = $("div.skill:first").clone(true, true);
    $(userFields).appendTo("div#skills");
    $("div#skills").children("div.skill:last").children().children().children().each(function() {

        if($(this).is("select")){
            $(this).prop('selectedIndex',0);
        }
        if($(this).is("input:text")){
            $(this).val('');
        }
        if($(this).is("input:hidden")){
            $(this).val('');
        }
        if($(this).hasClass("skill_rank")){
            $(this).val(rank);
        }
        if($(this).hasClass("skill_rank_switch")){
            
            if(rank >= 3){
                $(this).val("1");
            }else{
                $(this).val("0");
            }
        }
        
        
    });
    $('div.skill').each(function(rowIndex){
      /// find each input with a name attribute inside each row
      $(this).find('[name]').each(function(){
        var name;
        
        name = $(this).attr('name');
        name = name.replace(/\[[0-9]+\]/g, '['+rowIndex+']');
        $(this).attr('name',name);
      });
    });
    $('.skill_name').select2();
    count++;
});

$(".remove_skill").click(function(){
    $(this).closest(".skill").remove();
})

var countb = <?php echo $backgroundCount; ?> 
$("#add_background").click(function(){
    $(".background_name").select2("destroy");
    var userFields = $("div.background:first").clone(true, true);
    $(userFields).appendTo("div#backgrounds");
    $("div#backgrounds").children("div.background:last").children().children().children().each(function() {

        if($(this).is("select")){
            $(this).prop('selectedIndex',0);
        }
        if($(this).is("input:text")){
            $(this).val('');
        }
        if($(this).is("input:hidden")){
            $(this).val('');
        }
    });
    $('div.background').each(function(rowIndex){
      /// find each input with a name attribute inside each row
      $(this).find('[name]').each(function(){
        var name;
        
        name = $(this).attr('name');
        name = name.replace(/\[[0-9]+\]/g, '['+rowIndex+']');
        $(this).attr('name',name);
      });
    });
    $(".background_name").select2();
    countb++;
});

$(".remove_background").click(function(){
    $(this).closest(".background").remove();
})

var countc = <?php echo $giftCount; ?> 
$("#add_gift").click(function(){
    $(".giftslist").select2("destroy");
    var userFields = $("div.gift:first").clone(true, true);
    $(userFields).appendTo("div#gifts");
    $("div#gifts").children("div.gift:last").children().each(function() {
        newname = ($(this).attr('name'))+countc;
        //$(this).attr('name', newname);
        if($(this).is("select")){
            $(this).prop('selectedIndex',0);
        }
        if($(this).is("input:text")){
            $(this).val('');
        }
    });
    $(".giftslist").select2();
    countc++;
});

$(".remove_gift").click(function(){
    $(this).closest(".gift").remove();
})

var countd = <?php echo $meritCount; ?> 
$("#add_merit").click(function(){
    $(".meritslist").select2("destroy");
    var userFields = $("div.merit:first").clone(true, true);
    $(userFields).appendTo("div#merits");
    $("div#merits").children("div.merit:last").children().each(function() {
        newname = ($(this).attr('name'))+countd;
        //$(this).attr('name', newname);
        if($(this).is("select")){
            $(this).prop('selectedIndex',0);
        }
        if($(this).is("input:text")){
            $(this).val('');
        }
    });
    $(".meritslist").select2();
    countd++;
});

$(".remove_merit").click(function(){
    $(this).closest(".merit").remove();
})

var counte = <?php echo $flawCount; ?> 
$("#add_flaw").click(function(){
    $(".flawslist").select2("destroy");
    var userFields = $("div.flaw:first").clone(true, true);
    $(userFields).appendTo("div#flaws");
    $("div#flaws").children("div.flaw:last").children().each(function() {
        newname = ($(this).attr('name'))+counte;
        //$(this).attr('name', newname);
        if($(this).is("select")){
            $(this).prop('selectedIndex',0);
        }
        if($(this).is("input:text")){
            $(this).val('');
        }
    });
    $(".flawslist").select2();
    counte++;
});

$(".remove_flaw").click(function(){
    $(this).closest(".flaw").remove();
})

$('.select2').select2();