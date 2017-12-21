var currentTab = 0; // Current tab is set to be the first tab (0)
var subj=true;
var team=true;
showTab(currentTab); // Display the crurrent tab

function GotoCreateTeam()
{
  var x = document.getElementsByClassName("tab");
   x[currentTab].style.display = "none";
  currentTab=2;
  showTab(2);

}

function SubjChosen()
{
	subj=true;
}
function TeamChosen(teamname)
{
	document.getElementById("dropdownMenuLink").innerHTML=teamname;
	team=true;

}

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
     document.getElementById("prevBtn").style.display = "none";
  } else {
     document.getElementById("prevBtn").style.display = "inline";
  }
 // if (n == (x.length - 1)) {
 //     document.getElementById("nextBtn").innerHTML = "Submit";
 //  } else {
 //    document.getElementById("nextBtn").innerHTML = "Next";
 //   }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  if (currentTab == 0 && !subj && n==1 ) return false;
   if (currentTab == 1 && !team && n==1 ) return false;

  // Exit the function if any field in the current tab is invalid:

  //if (n == 1 && !validateForm() || !subj ) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  if(currentTab== 2)
    currentTab=0;
  else
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  // if (currentTab == x.length-2) {
  //   // ... the form gets submitted:
  //   document.getElementById("SubForm").submit();
  //   currentTab=x.length-1;
  //   showTab(currentTab);
  //   return false;
  // }
  // // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, z,  i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByTagName("textarea")
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }

  for (i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "") {
      // add an "invalid" class to the field:
      z[i].className += "is-invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid ) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}