// Initialize Firebase
var firebaseConfig = {
    apiKey: "AIzaSyDpeyJI__AxgXCalbW3T1qiAYhyl1vysAY",
    authDomain: "alerter-1550608159585.firebaseapp.com",
    databaseURL: "https://alerter-1550608159585.firebaseio.com",
    projectId: "alerter-1550608159585",
    storageBucket: "alerter-1550608159585.appspot.com",
    messagingSenderId: "22445665425",
    appId: "1:22445665425:web:52e23beb026c05ff332330"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

var returnArr = [];
var details =[];
var countU =0;
var countE,countC = 0;
function displayStat(){
   getAllUsers();
   getAllEmergencies();
//    getAllContacts();
   getEmergencies();
   getLocation();
   getAllContactsByDate();
}

// func to get all user ref from firebase
function getAllUsers() {
    var query = firebase.database().ref('User/');
    query.once("value").then(function(snapshot) {
        snapshot.forEach(function(childSnapshot) {
            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();
            returnArr.push(childData);
            
        });
        for(i =0; i<returnArr.length; i++){

        }
        countU = returnArr.length;
        document.getElementById("users").innerHTML = countU;
    });
    
}
// function to return the amount of users
function getUserCount(arr) {
    var userCount = arr.length;
    return userCount;
}

// func to get all emergencies ref from firebase
function getAllEmergencies() {
    var emergenciesRef = firebase.database().ref('Emergencies/');
    // alert("Welcome.... Report is ready");
    emergenciesRef.on('value', function(snapshot) {
        snapshot.forEach(function(childSnapshot) {
            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();
            returnArr.push(childData);
        });
        // getEmergencies(returnArr);
        countE = returnArr.length;
        document.getElementById("emer").innerHTML = countE;
    });
}
// function to return the emergencies
function getEmergencies() {

    
    




    var fragment = document.createDocumentFragment();
var table = document.createElement("table");

var query = firebase.database().ref("Emergencies/");

query.once("value").then(function(snapshot) {
  snapshot.forEach(function(childSnapshot) {
    var tr = document.createElement("tr");
    // var trValues = [childSnapshot.key,childSnapshot.val()];
    var trValues = [childSnapshot.key,childSnapshot.val()];
    console.log(childSnapshot.key);
    //console.log(childSnapshot.val());
    // for (var i = 0; i < trValues.length; i++) {
    //   var td = document.createElement("td");

    //   td.textContent = Object.values(trValues[i]);
    //   tr.appendChild(td);
    // }
    // var td = document.createElement("td");
    // td.textContent = childSnapshot.val()['date'];
    // td.textContent = childSnapshot.val()['description'];
    // // childSnapshot.val()['description'];
    // tr.appendChild(td);
    // console.log(childSnapshot.val()['date']);
    // console.log(childSnapshot.val()['description']);
   // var elem = "<td>"+childSnapshot.val()['date']+"</td> <td>"+childSnapshot.val()['description']+"</td>";
  //  document.getElementById("table_body").innerHTML = elem;
    // Get a reference to the table
    let tableRef = document.getElementById("table_body");

    // Insert a row at the end of the table
    let newRow1 = tableRef.insertRow(-1);
    
    // Insert a cell in the row at index 0
    let newCell1 = newRow1.insertCell(0);
    let newCell2= newRow1.insertCell(1);
    let newCell3= newRow1.insertCell(2);
    let newCell4= newRow1.insertCell(3);
    let newCell5= newRow1.insertCell(4);
    
    // Append a text node to the cell
    let newText1 = document.createTextNode(childSnapshot.val()['date']);
    newCell1.appendChild(newText1);
    // Insert a cell in the row at index 0
    
    
      // Append a text node to the cell
      let newText2 = document.createTextNode(childSnapshot.val()['description']);
      newCell2.appendChild(newText2);
 // Append a text node to the cell
 let newText3 = document.createTextNode(childSnapshot.val()['emergencyTitle']);
 newCell3.appendChild(newText3);
  // Append a text node to the cell
  let newText4 = document.createTextNode(childSnapshot.val()['location']);
  newCell4.appendChild(newText4);
  // Append a text node to the cell
  let newText5 = document.createTextNode(childSnapshot.val()['postedTime']);
  newCell5.appendChild(newText5);
  
    // table.appendChild(tr);
  });
});

fragment.appendChild(table);
// document.body.appendChild(fragment);
document.getElementById("table_area").append(fragment);
}

// func to get all contacts ref from firebase
// function getAllContacts() {
//     var contactRef = firebase.database().ref('Contacts/');
//     // alert("Welcome.... Report is ready");
//     contactRef.on('value', function(snapshot) {
//         snapshot.forEach(function(childSnapshot) {
//             var childKey = childSnapshot.key;
//             var childData = childSnapshot.val();
//             returnArr.push(childData);
            
//         });
//         countC = returnArr.length;
//         console.log(countC);
//         document.getElementById("contacts").innerHTML = countC;
//     });
    
// }

function showLocation(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var latlongvalue = position.coords.latitude + ","
    + position.coords.longitude;
    var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlongvalue+"&amp;zoom=14&amp;size=3000x600&amp;key=AIzaSyAa8HeLH2lQMbPeOiMlM9D1VxZ7pbGQq8o";
    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
 }
 function errorHandler(err) {
    if(err.code == 1) {
       alert("Error: Access is denied!");
    } else if( err.code == 2) {
       alert("Error: Position is unavailable!");
    }
 }
 function getLocation(){
    if(navigator.geolocation){
       // timeout at 60000 milliseconds (60 seconds)
       var options = {timeout:60000};
       navigator.geolocation.getCurrentPosition
       (showLocation, errorHandler, options);
    } else{
       alert("Sorry, browser does not support geolocation!");
    }
 }

// get based on a child element
// func to get all contacts ref from firebase
function getAllContactsByDate() {
    var contactRef = firebase.database().ref().child('Contacts/').orderByChild('date');
    // alert("Welcome.... Report is ready");
    contactRef.on('value', function(snapshot) {
        snapshot.forEach(function(childSnapshot) {
            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();
            returnArr.push(childData);
            
        });
        for ( i = 0; i < returnArr.length; i++) {
            details.push(returnArr[i]) ;
            // console.log(details[i]);
        }
        // document.getElementById("contacts").innerHTML = countC;
    });
    
}