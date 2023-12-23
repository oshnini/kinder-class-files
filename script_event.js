window.onload = function(){
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");
    const searchBtn = document.querySelector(".bx-search")

    closeBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    searchBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    function menuBtnChange(){
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu","bx-menu-alt-right")
        }else{
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu")
        }
    }
}

//schedule and rulesscript
document.addEventListener("DOMContentLoaded",function(){
    const schedule = document.getElementById("schedTbl");
    const addSched = document.getElementById("addSchedBtn");
    const editSched = document.getElementById("editSchedBtn");
    const modalSched = document.getElementById("addSchedModal");
    const closeSched = document.querySelector(".closeS");
    const insertSched = document.getElementById("insertSched");

    var scheduleData = [
        ["7:00am - 7:10am", "10", "Arrival Time"],
        ["7:10am - 7:20am", "10", "Meeting Time 1"],
        ["7:20am - 8:05am", "45", "Work Period 1"],
        ["8:05am - 8:15am", "15", "Meeting Time 2"],
        ["8:15am - 8:30am", "15", "Recess"],
        ["8:30am - 8:40am", "10", "Quiet Time"],
        ["8:40am - 8:55am", "15", "Stories / Rhymes / Poem / Song"],
        ["8:55am - 9:35am", "40", "Work Period 2"],
        ["9:35am - 9:55am", "20", "Indoor / Outdoor Activity"],
        ["9:55am - 10:00am", "5", "Meeting Time 3 / Dismissal Time"]
    ];
    
    function loadSchedule(){
        for (var i = 0; i < scheduleData.length; i++) {
                var row = schedule.insertRow(-1);
    
                for (var j = 0; j < scheduleData[i].length; j++) {
                    var cell = row.insertCell(j);
                    cell.innerHTML = scheduleData[i][j];
                }
            };
    };

    addSched.addEventListener("click", function(){
        openSchModal();
    });
    // Function to open the modal
    function openSchModal() {
        modalSched.style.display = "block";
    }

    // Function to close the modal
    closeSched.onclick = function () {
        modalSched.style.display = "none";
    };

    // Function to insert a new row into the schedule table
    insertSched.addEventListener("click",function(){
        var newTime = document.getElementById("newTime");
        var newMins = document.getElementById("newMins");
        var newBlock = document.getElementById("newBlock");
        var newSched = [newTime.value,newMins.value,newBlock.value];
        
        scheduleData.push(newSched);
        
        while(schedule.rows.length>1){
            schedule.deleteRow(1);
        }
        loadSchedule();
        modalSched.style.display = "none";
        newTime.value = "";
        newMins.value = "";
        newBlock.value = "";
    })
    loadSchedule();
});

document.addEventListener("DOMContentLoaded", function(){
    const rules = document.getElementById("ruleLst");
    const addRule = document.getElementById("addRuleBtn");
    const editRule = document.getElementById("editRuleBtn");
    const modalRule = document.getElementById("addRuleModal");
    const closeRule = document.querySelector(".closeR");
    const insertRule = document.getElementById("insertRule");

    var ruleData = ["Listen to your parents.",
                    "Be ready to learn.",
                    "Do exercises and activities on time.",
                    "Discuss about your day.",
                    "Have fun with your parents."];
    function loadRules(){
        for (var i = 0; i < ruleData.length; i++) {
            var rule = ruleData[i];
      
            // Create a new list item
            var listItem = document.createElement("li");
      
            // Set the text content of the list item
            listItem.appendChild(document.createTextNode(rule));
      
            // Append the new list item to the ordered list
            rules.appendChild(listItem);
          }
    }

    addRule.addEventListener("click", function(){
        openRulModal();
    });
    // Function to open the modal
    function openRulModal() {
        modalRule.style.display = "block";
    }

    // Function to close the modal
    closeRule.onclick = function () {
        modalRule.style.display = "none";
    };

    // Function to insert a new row into the rule list
    insertRule.addEventListener("click",function(){
        var newRule = document.getElementById("newRule");
        
        ruleData.push(newRule.value);
        
        while (rules.firstChild) {
            rules.removeChild(rules.firstChild);
          }

        loadRules();
        modalRule.style.display = "none";
        newRule.value = "";
    });
    loadRules();
});


//events calendar script
document.addEventListener("DOMContentLoaded", function () {
    const prevMonthBtn = document.getElementById("prevMonthBtn");
    const nextMonthBtn = document.getElementById("nextMonthBtn");
    const currentMonth = document.getElementById("currentMonth");
    const calendarGrid = document.getElementById("calendarGrid");

    let currentDate = new Date();

    function loadCalendar() {
        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
        const dayCount = lastDay.getDate();
        const initialDay = firstDay.getDay();

        currentMonth.textContent = `${currentDate.toLocaleString('default', { month: 'long' })} ${currentDate.getFullYear()}`;
        calendarGrid.innerHTML = "";

        for (let i = 0; i < initialDay; i++) {
            const emptyDay = document.createElement("div");
            emptyDay.classList.add("day");
            calendarGrid.appendChild(emptyDay);
        }

        for (let day = 1; day <= dayCount; day++) {
            const dateElement = document.createElement("div");
            dateElement.textContent = day;
            dateElement.classList.add("day");

            if (currentDate.getFullYear() === new Date().getFullYear() && currentDate.getMonth() === new Date().getMonth() && day === new Date().getDate()) {
                dateElement.classList.add("current-month-day");
            }

            dateElement.addEventListener("click", function () {
                const selectedDay = document.querySelector(".selected-day");
                if (selectedDay) {
                    selectedDay.classList.remove("selected-day");
                }
                dateElement.classList.add("selected-day");
            });

            calendarGrid.appendChild(dateElement);
        }
    }

    calendarGrid.addEventListener("click", function (event) {
        const targetDay = event.target;
        if (targetDay.classList.contains("day")) {
            openReminderModal(targetDay);
        }
    });

    function openReminderModal(dayElement) {
        const reminderModal = document.getElementById("reminderModal");
        const closeBtn = document.querySelector(".close");
        const reminderInput = document.getElementById("reminderInput");
        const saveReminderBtn = document.getElementById("saveReminderBtn");

        // Display the modal
        reminderModal.style.display = "block";

        // Close the modal when the close button is clicked
        closeBtn.onclick = function () {
            reminderModal.style.display = "none";
        };

        // Save the reminder and close the modal when the save button is clicked
        saveReminderBtn.onclick = function () {
            const reminderText = reminderInput.value.trim();
            if (reminderText !== "") {
                const reminderElement = document.createElement("div");
                reminderElement.classList.add("reminder");
                reminderElement.textContent = reminderText;
                dayElement.appendChild(reminderElement);
                reminderModal.style.display = "none";
                reminderInput.value = "";
            }
        };

        // Close the modal if the user clicks outside of it
        window.onclick = function (event) {
            if (event.target == reminderModal) {
                reminderModal.style.display = "none";
            }
        };
    }

    prevMonthBtn.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        loadCalendar();
    });

    nextMonthBtn.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        loadCalendar();
    });

    loadCalendar();
});

//edit profile script
document.addEventListener("DOMContentLoaded", function(){
    var buttonState = document.getElementById("userEditBtn");
    
    buttonState.addEventListener("click",function(){
        var lName = document.getElementById("lName");
        var lNameE = document.getElementById("lNameE");
        var fName = document.getElementById("fName");
        var fNameE = document.getElementById("fNameE");
        var mName = document.getElementById("mName");
        var mNameE = document.getElementById("mNameE");
        var age = document.getElementById("age");
        var ageE = document.getElementById("ageE");
        var bDate = document.getElementById("bDate");
        var bDateE = document.getElementById("bDateE");
        var sNum = document.getElementById("sNum");
        var sNumE = document.getElementById("sNumE");
        var address = document.getElementById("address");
        var addressE = document.getElementById("addressE");
        var parent = document.getElementById("parent");
        var parentE = document.getElementById("parentE");
        var contact = document.getElementById("contact");
        var contactE = document.getElementById("contactE");
        var occupation = document.getElementById("occupation");
        var occupationE = document.getElementById("occupationE");

        if (buttonState.innerHTML == "Edit your information"){
            lName.style.display = "none";
            fName.style.display = "none";
            mName.style.display = "none";
            age.style.display = "none";
            bDate.style.display = "none";
            sNum.style.display = "none";
            address.style.display = "none";
            parent.style.display = "none";
            contact.style.display = "none";
            occupation.style.display = "none";
            lNameE.style.display = "";
            fNameE.style.display = "";
            mNameE.style.display = "";
            ageE.style.display = "";
            bDateE.style.display = "";
            sNumE.style.display = "";
            addressE.style.display = "";
            parentE.style.display = "";
            contactE.style.display = "";
            occupationE.style.display = "";
            buttonState.innerHTML = "Save Changes";

            lNameE.value = lName.innerHTML;
            fNameE.value = fName.innerHTML;
            mNameE.value = mName.innerHTML;
            ageE.value = age.innerHTML;
            bDateE.value = bDate.innerHTML;
            sNumE.value = sNum.innerHTML;
            addressE.value = address.innerHTML;
            parentE.value = parent.innerHTML;
            contactE.value = contact.innerHTML;
            occupationE.value = occupation.innerHTML;
        }else{
            lNameE.style.display = "none";
            fNameE.style.display = "none";
            mNameE.style.display = "none";
            ageE.style.display = "none";
            bDateE.style.display = "none";
            sNumE.style.display = "none";
            addressE.style.display = "none";
            parentE.style.display = "none";
            contactE.style.display = "none";
            occupationE.style.display = "none";
            lName.style.display = "";
            fName.style.display = "";
            mName.style.display = "";
            age.style.display = "";
            bDate.style.display = "";
            sNum.style.display = "";
            address.style.display = "";
            parent.style.display = "";
            contact.style.display = "";
            occupation.style.display = "";
            buttonState.innerHTML = "Edit your information";

            lName.innerHTML = lNameE.value;
            fName.innerHTML = fNameE.value;
            mName.innerHTML = mNameE.value;
            age.innerHTML = ageE.value;
            bDate.innerHTML = bDateE.value;
            sNum.innerHTML = sNumE.value;
            address.innerHTML = addressE.value;
            parent.innerHTML = parentE.value ;
            contact.innerHTML = contactE.value;
            occupation.innerHTML = occupationE.value;
        };
    });
});