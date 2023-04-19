"use strict";

$(document).ready( () => {

    //error message time to live (show on screen)
    const stall = async () => {
        const delay = ms => new Promise(res => setTimeout(res, ms));

        await delay(4500);
        
        console.log("Waited 5s");
        document.getElementById("abortDel").style.display="none";
    };


    //part 1, adding event listeners to all delete buttons
    let obj = document.querySelectorAll("#deleteForm");
    for(let i = 0; i < obj.length; i++){
        obj[i].addEventListener("submit", (event)=>{
            if(!confirm("Are you sure you want to delete this item?")){
                event.preventDefault();
                document.getElementById("abortDel").style.display="flex";
                stall();
                //document.getElementById("abortDel").style.display="none";
            }
        });
    }

    $("#addJewelForm").submit( event => {

        let valid = true;
        //getting all values from form submit
        const code = $("#code").val();
        const name = $("#name").val();
        const price = $("#price").val();
        const description = $("#description").val();
        //resetting error messages on new load
        $("#code").next().text("*");
        $("#name").next().text("*");
        $("#price").next().text("*");
        //highest text box to direct focus to when showing error
        var badOne = "";

        //field validations
        if(code === "" || isNaN(code) || code.length < 3 || code.length > 11) {
            console.log("code");
            $("#code").next().text("* Enter a valid four digit number.");
            valid = false;
            console.log("SETTING BAD ONE");
            badOne = $("#code");
        }
        if(name === "" || name.length < 9 || name.length > 101){
            console.log("name");
            $("#name").next().text("* Must be between 10-100 chars.");
            valid = false;
            if(badOne == ""){
                console.log("SETTING BAD ONE");
                badOne = $("#name");
            }
        }
        if(price === "" || isNaN(price) || price < 100 || price > 100000){
            console.log("price");
            $("#price").next().text("* Enter a valid positive number g.t. 100.");
            valid = false;
            if(badOne == ""){
                console.log("SETTING BAD ONE");
                badOne = $("#price");
            }
        }
        if (description === "" || description.length < 10 || description.length > 256){
            console.log("desc");
            $("#description").val("\n     >>>Enter a description for your item!<<<\n>>>This could be anything to describe your item<<<\n    >>>Must be between 10 and 256 characters<<< ");
            valid = false;
            if(badOne == ""){
                console.log("SETTING BAD ONE");
                badOne = $("#description");
            }
        }
        //if field validation failed anywhere
        if(!valid){
            event.preventDefault();
            document.getElementById("abortDel").style.display="flex";
            stall();
            badOne.focus();
        }

    });

    //sticky error message
    $(window).scroll(function(e){ 
        var $el = $('#abortDel'); 
        var isPositionFixed = ($el.css('position') == 'fixed');
        if ($(this).scrollTop() > 200 && !isPositionFixed){ 
          $el.css({'position': 'fixed', 'top': '-25px'}); 
        }
        if ($(this).scrollTop() < 200 && isPositionFixed){
          $el.css({'position': 'static', 'top': '0px'}); 
        } 
    });

    //reset all error messages on reset button click
    $("#resetBUTTON").click( () => {
        console.log("resetting!");
        $("#code").next().text("*");
        $("#name").next().text("*");
        $("#price").next().text("*");

        var badOne = "";
    })




    // preload images
    $("#image_list a").each( (index, link) => {
        const image = new Image();
        image.src = link.href;
    });
 
    // attach event handlers for links
    $("#image_list a").click( evt => {
        // get clicked <a> tag
        const link = evt.currentTarget;
        
        // swap image
        $("#main_image").attr("src", link.href);
        
        //swap caption
        $("#caption").text(link.title);
        // cancel the default action of the link
        evt.preventDefault();
        // move focus to first thumbnail
        $("li:first-child a").focus();
    });
 
});