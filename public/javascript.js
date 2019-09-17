var PitchSelected;

function PageLoad() {

    updateOptionValues(); 

    //When the page loads, pitch number 1 will be selected by default.
    //this value will change as the user selects the different pitches.
    PitchSelected = 1;

    selectPitch(1);
    
}                


function yearChanged() {
    var d = new Date();
    var currentMonth = d.getMonth();
    
    var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
    
    //as the first position of the array starts at 0,
    //the loop must go from 0-11 not 1-12.
    for(i = 0; i <= 11; i++){
        
        var select = document.getElementById("month");
        var option = document.createElement('option');
        
        //the getMonth function sets january to 0 not 1,
        //so the value i doesn't need to be changed
        if(i >= currentMonth){
            option.innerHTML = months[i];
            option.id = i + 1;
            
            //i has to be incremented as the other 
            //functions use the real values for months (Jan = 1)
            option.value = i + 1;  
            select.add(option);
        }

    }
}

//function called when month dropdown is changed.
function monthChanged() {

    var select = document.getElementById("day");
    var month = document.getElementById("month").value;
    
    var length = select.options.length;

    var d = new Date();
    var currentDay = d.getDate();
    var currentMonth = d.getMonth();
    currentMonth += 1;

    for(i = length; i > 0; i--){
        select.options[i] = null;
    }

    for(i = 1; i <= daysInMonth(month, 2015); i++){

        var option = document.createElement('option');
        option.value = i;
        option.innerHTML = i;
        option.id = "D " + i.toString()

        if((month == currentMonth) && (i >= currentDay)){
            select.add(option);
        }else if(month > currentMonth){
            select.add(option);
        } 
    }

}

function dayChanged() {

    var select = document.getElementById("time_");
    var time = "";
    
    var date = new Date();
    var hour = date.getUTCHours() + 1;
    var minute = date.getUTCMinutes();
    
    alert(hour);
    
    if(hour > 14){
        
        var start = hour;
        
    }else{
        
        var start = 14;
        
    }
    
    for(i = start; i <= 21; i++){
    
        var optionA = document.createElement('option');
        var optionB = document.createElement('option');
        
        for(j = 1; j <= 2; j++){
            if(j == 1){
                time = i + ":00";
                optionA.innerHTML = time;
                optionA.value = time;
                optionA.id = time;
                select.add(optionA);
            }else{
                time = i + ":30";
                optionB.innerHTML = time;
                optionB.value = time;
                optionB.id = time;
                select.add(optionB);
            }
        }   
    }
}


 //function used to get the number of days in the selected month.
function daysInMonth(month,year) {
    return new Date(year, month, 0).getDate();
}



function selectPitch(pitchNum){


    document.getElementById("Pitch_Number").innerHTML = pitchNum;

    var previousPitch = "#Pitch" + PitchSelected.toString();
    var clickedPitch = "#Pitch" + pitchNum.toString();

    if(PitchSelected <= 10){
        $(previousPitch).removeClass("selected_up");
    }else{
        $(previousPitch).removeClass("selected_down");
    }

    if(pitchNum <= 10){
        $(clickedPitch).addClass("selected_up");
    }else{
        $(clickedPitch).addClass("selected_down");
    }

    if($(clickedPitch).hasClass("available")){

        $("#slot_details").css("display", "block");
        $("#slot_booked").css("display", "none");
        $("#slot_league_match").css("display", "none");

    }else if($(clickedPitch).hasClass("booked")){

        $("#slot_details").css("display", "none");
        $("#slot_booked").css("display", "block");
        $("#slot_league_match").css("display", "none");

    }else{

        $("#slot_details").css("display", "none");
        $("#slot_booked").css("display", "none");
        $("#slot_league_match").css("display", "block");

    }

    PitchSelected = pitchNum;

}
