function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  
    let elementss = document.getElementById("check");
    var textValue= elementss.textContent;
    if(textValue==="Pending")
    {
      elementss.style.color = "green";
    }
    else if(textValue==="Completed"){
      cells.style.color = "orange";
    }
    else{
      cells.style.color = "blue";
    }