"use strict";

/*
    Andrew Dickman
    4/5/2023
    IT202-004
    Phase 5 - Jewelry Store Project
    ajd93@njit.edu
*/

//once DOM is fully loaded
$(document).ready( () => {

    //message time to live (show on screen)
    const stall = async () => {
        const delay = ms => new Promise(res => setTimeout(res, ms));

        await delay(5000);
        
        console.log("Waited 5s");
        document.getElementById("abortDel").style.display="none";
    };


    //part 1, adding event listeners to all delete buttons
    let obj = document.querySelectorAll("#deleteForm");
    for(let i = 0; i < obj.length; i++){
        obj[i].addEventListener("submit", (event)=>{
            if(!confirm("Are you sure you want to delete this item?")){ //if the user hit no, they don't want to delete the item.
                event.preventDefault(); //prevent submission of form
                document.getElementById("abortDel").style.display="flex"; //these next two lines and function are for message
                stall();
                //document.getElementById("abortDel").style.display="none";
            }
        });
    }
    //once the form is submitted
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
            $("#price").next().text("* Enter a valid positive number l.t. 100,000.");
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

    //sticky message after declining confirmation when deleting item
    $(window).scroll(function(e){ 
        var $el = $('#abortDel'); 
        var isPositionFixed = ($el.css('position') == 'fixed');
        if ($(this).scrollTop() > 0 && !isPositionFixed){ 
          $el.css({'position': 'fixed', 'top': '-25px'}); 
        }
        if ($(this).scrollTop() < 0 && isPositionFixed){
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

    //blur and unblur img on hover
    const image = document.getElementById("jewelryIMG");
    try{ //add event listeners to the image
        image.addEventListener("mouseover", mouseOVER);
        image.addEventListener("mouseout", mouseOUT);
    }
    catch(TypeError){ //for every page's console thats not the details.php page, since they don't contain the image
        console.log("Dw about this.");
    }
    function mouseOVER() { //when user mouses over the image
        console.log("MOUSEOVERRR!");
        const src = image.src;
        const new_src = src.replace("b.png",".png"); //replace image src with the normal one
        image.src = new_src;
    }
    function mouseOUT(){ //when user mouses out of image
        console.log("MOUSEOUTT!");
        const src = image.src;
        const new_src = src.replace(".png","b.png"); //replace image src with the blurry one
        image.src = new_src;
    }
 
});