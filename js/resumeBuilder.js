/*
This is empty on purpose! Your code to build the resume will go here.
 $("#main").append([javier]);
 var firstName = "Javier Farinos";
 var age = 32;
 console.log(firstName);
 var awesomeThoughts = "I am "+firstName+ " I am AWESOME";
 console.log(awesomeThoughts);
 var funThoughs = awesomeThoughts.replace("AWESOME","FUN");
 $("#main").append(funThoughs);
 console.log(awesomeThoughts);
*/

var bio = {
          "name" : "Javier Farinos",
          "role" : "WebDeveloper",
          "welcomeMessage" : "Hello !!.", 
          "image" : "images/perfil.png",
          "contacts" : 
              [{
                "mobile" : "555-55-55",
                "skype" : "jafamo2", 
                "location" : "Chelmsford",
                "email" : "jafamo@gmail.com"
              }], 
  "skills" : ["Java","PHP","JavaScript","MySQL", "Git", "HTML"]

};

//-WORK--------------------------------------------------------------
var work = {
  "jobs" : [
      {
        
        "employer": "Tisssat",
        "title" : "HelpDesk",
        "dates" : 2015,
        "location":"Valencia",
        "description": "HelpDesk with differents OS (Linux, Windows). Resolving incidences Java version 1.6.39"
      },
      {
        "title" : "SysAdmin",
        "employer": "Dimension Informatica",
        "dates" : 2006,
        "location":"Valencia ",
        "description": "Install servers (Apache,VSFT).Install and configure SO (Windows and Linux)."
      }]
    };



/*------------EDUCATION-----------------*/
var education = {
  "schools" : [
      {
        "name" : "Universidad Politecnica de Valencia",
        "degree" : "Bachelor of IT Engienering (B.A.Sc.)",
        "dates" : "2006 - 2015",
        "majors" : "computer science",
        "location" : "Valencia  (Spain)",
        "url" : "http://www.upv.es/en/"
      },
      {
        "name" : "Politecnico di Milano",
        "degree" : "Bachelor of Applied Science (B.A.Sc.) ERASMUS student",
        "dates" : "2012 - 2013",
        "majors" : "computer science",
        "location" : "Como - Milan (Italy)",
        "url" : "http://www.polo-como.polimi.it/en/"
      },
    {
      "name" : "Florida University",
      "degree" : "FP2, Computer Systems Networking and Telecommunications",
      "dates" : "2004 - 2006",
      "majors" : "computer science",
      "location" : "Catarroja - Valencia (Spain)",
      "url" : "http://www.florida-uni.es/web_en/home.php"
    }],


    "online courses" : [{
          "title" : "Front-End Web Developer Nanodegree",
          "school" : "udacity",
          "dates" : "2014 - 2015",
          "url" : "https://www.udacity.com/course/nd001"
  }]
  };


 



bio.display = function() {
  var formattedName = HTMLheaderName.replace("%data%",bio.name);
  var formattedRole = HTMLheaderRole.replace("%data%",bio.role);
  var formattedImage = HTMLbioPic.replace("%data%",bio.image);
  var formattedMessage = HTMLWelcomeMsg.replace("%data%",bio.welcomeMessage);

  $("#header").prepend(formattedRole).prepend(formattedName).append(formattedImage,formattedMessage);
  $("#header").append(HTMLskillsStart);

  for(skill in bio.skills) {
    var formattedSkills = HTMLskills.replace("%data%",bio.skills[skill]);
    $("#skills").append(formattedSkills);
  };

  for(contact in bio.contacts) {
    var formattedMobile = HTMLmobile.replace("%data%",bio.contacts[contact].mobile);
    var formattedEmail = HTMLemail.replace("%data%",bio.contacts[contact].email);
    var formattedSkype = HTMLcontactGeneric.replace("%contact%","skype").replace("%data%",bio.contacts[contact].skype);
    $("#footerContacts").append(formattedMobile,formattedEmail,formattedSkype);
  };
};

education.display = function() {
  for(school in education.schools) {
    $("#education").append(HTMLschoolStart);
    
    var formattedName = HTMLschoolName.replace("%data%",education.schools[school].name);
    var formattedDegree = HTMLschoolDegree.replace("%data%",education.schools[school].degree);
    var formattedDates = HTMLschoolDates.replace("%data%",education.schools[school].dates);
    var formattedLocation = HTMLschoolLocation.replace("%data%",education.schools[school].location);
    var formattedMajor = HTMLschoolMajor.replace("%data%",education.schools[school].majors);
    var formattedUrl = HTMLonlineURL.replace("%data%",education.schools[school].url);
    $(".education-entry:last").append(formattedName + formattedDegree,formattedDates,formattedLocation,formattedMajor,formattedUrl);
  }
};

work.display = function() {
  for(job in work.jobs) {
    $("#workExperience").append(HTMLworkStart);
    
    var formattedEmployer = HTMLworkEmployer.replace("%data%",work.jobs[job].employer);
    var formattedTitle = HTMLworkTitle.replace("%data%",work.jobs[job].title);
    var formattedDates = HTMLworkDates.replace("%data%",work.jobs[job].dates);
    var formattedDescription = HTMLworkDescription.replace("%data%",work.jobs[job].description);

    $(".work-entry:last").append("<br>"+ formattedEmployer + formattedTitle,formattedDates,formattedDescription);
  }
};

/*projects.display = function(){
  for(item in projects.project){
    $("#projects").append(HTMLprojectStart);
    var formattedTitle = HTMLprojectTitle.replace("%data%",projects.project[item].title);
    var formattedDates = HTMLprojectDates.replace("%data%",projects.project[item].dates);
    var formattedDescription = HTMLprojectDescription.replace("%data%",projects.project[item].description);
    
    $(".project-entry:last").append(formattedTitle,formattedDates,formattedDescription);
    for (image in projects.project[item].images) {
      var formattedImage = HTMLprojectImage.replace("%data%",projects.project[item].images[image]);
      $(".project-entry:last").append(formattedImage);
    };
    

    
  }
};*/


function inName(name){
  console.log(name);
  var newName = name;
  newName = newName[0].toUpperCase() + newName.slice(1,newName.indexOf(" ") + 1).toLowerCase() + newName.slice(newName.indexOf(" ") + 1).toUpperCase(); 

  return newName;
};


work.display();
//projects.display();
education.display();
bio.display();

$("#main").append(internationalizeButton);
$("#mapDiv").append(googleMap);

