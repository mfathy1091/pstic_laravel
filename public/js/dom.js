var registeredBtn = document.getElementById('registered');
// console.log(registeredBtn);

registeredBtn.addEventListener('click', runEvent);

function runEvent(e){
    // print type of event
    console.log('EVENT TYPE: '+e.type);
}