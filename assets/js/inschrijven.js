let dagen;

let obj = {
    emails: []
}

let menus = {
    menu1: 'Gehaktballetjes met prei en curry',
    menu2: 'Scampi met courgette in een kruidensausje',
    menu3: 'Groenten met feta en noten',
    menu4: 'Curry met kip een rode paprika',
    menu5: 'Sla\'tje op basis van witlof, appeltjes, geitenkaas en spekjes.'
}

function init() {
    $('#content').hide();
    $('#loadingDiv').show();
    document.getElementById("submit").addEventListener("click", submit, false);
    $.get("https://beire-coole-bites-api.herokuapp.com/api/day/alldays", function (data) {
        $('#loadingDiv').hide();
        $('#content').show();
        dagen = data;
        done();
    })
}

function done() {
    loadMenus();
    toHtml();
}

function loadMenus() {
    addMenuToDay('maandag', menus.menu1);
    addMenuToDay('dinsdag', menus.menu2);
    addMenuToDay('woensdag', menus.menu3);
    addMenuToDay('donderdag', menus.menu4);
    addMenuToDay('vrijdag', menus.menu5);
}

function check(dag) {
    dag.lastChild.checked = true;
}

function toHtml() {
    let startDate = 2;
    let week = document.getElementById("week")
    dagen.forEach(d => {
        let dag = document.createElement('div');
        let naam = document.createElement('div');
        let menu = document.createElement('div');
        let radio = document.createElement('input')
        let plaatsenVrij = document.createElement('div')
        let plaatsenVrijText = document.createElement('div')
        let datum = document.createElement('div');

        dag.addEventListener("click", function () {
            check(dag);
        }, false);

        plaatsenVrijText.id = 'plaatsenVrijText'
        plaatsenVrij.id = 'plaatsenVrij'
        radio.type = 'radio'
        radio.name = 'group1'
        radio.id = 'radio';
        datum.id = 'datum';
        radio.setAttribute('class', 'form-radio');
        menu.setAttribute('class', 'menu')
        dag.setAttribute('class', 'dag');
        naam.setAttribute('class', 'dagNaam');

        plaatsenVrijText.innerHTML = 'beschikbare plaatsen: '
        if (d.maxCap - d.listPersons.length <= 0) {
            plaatsenVrij.innerHTML = 'VOLZET'
        }else{
            plaatsenVrij.innerHTML = d.maxCap - d.listPersons.length
        }
        

        menu.innerHTML = d.menu
        naam.innerHTML = d.dayName;

        datum.innerHTML = startDate + ' /12';

        startDate += 1;


        dag.appendChild(naam)
        dag.appendChild(datum)
        dag.appendChild(menu)
        dag.appendChild(plaatsenVrijText)
        dag.appendChild(plaatsenVrij)
        
        if (d.listPersons.length<=d.maxCap) {
            dag.appendChild(radio)
            
        }else{
            dag.style.opacity = 0.5;
        }

        week.appendChild(dag)

    });
}

function submit() {
    let gekozenDag;
    if (document.getElementById('voornaam').value === "" || document.getElementById('achternaam').value === "" || document.getElementById('email').value === "") {
        document.getElementById('nietOk').innerHTML = 'vul alle velden in'
    } else {
        document.getElementById('nietOk').innerHTML = ''
        if (!emailIsValid(document.getElementById('email').value)) {
            document.getElementById('emailNietOk').innerHTML = 'vul een geldig email in.'
        } else {

            document.getElementById('emailNietOk').innerHTML = ''
            var ele = document.getElementsByName('group1');
            for (i = 0; i < ele.length; i++) {
                if (ele[i].checked) {
                    gekozenDag = ele[i].parentElement.firstChild.innerHTML;
                }
            }
            let email = document.getElementById('email').value;
            let name = document.getElementById('voornaam').value + " " + document.getElementById('achternaam').value
            console.log(gekozenDag)
            Email.send({
                Host : "smtp.elasticemail.com",
                Username : "beirecool@gmail.com",
                Password : "4d7cdc40-8433-4c8c-96d2-75268af55dcb",
                To : 'beirecool@gmail.com',
                From : "beirecool@gmail.com",
                Subject : "Nieuwe inschrijving voor Beire Coole Bites",
                Body : name + " heeft zich ingeschreven met " + email + " voor " + gekozenDag
            }).then(
              console.log('email verzonden')
            );


            
            _ajax_request(`https://beire-coole-bites-api.herokuapp.com/api/day/addPerson?name=${name}&day=${gekozenDag}`, 'PUT', function (result) {
                if (result === '200 OK') {
                    alert('ingeschreven!');
                }
            })

        }

    }
}

function emailIsValid(email) {
    return /\S+@\S+\.\S+/.test(email)
}

function _ajax_request(url, method, callback) {
    return jQuery.ajax({
        url: url,
        type: method,
        success: callback
    });
}

function addMenuToDay(day, menu) {
    var result = dagen.find(obj => {
        return obj.dayName === day
    })

    result.menu = menu;
}






window.onload = init();