const stepDiv1 = document.getElementById('step-1')
const stepDiv2 = document.getElementById('step-2')
const stepDiv3 = document.getElementById('step-3')


const prev = document.getElementById('prev')
const next = document.getElementById('next')
const submit = document.getElementById('submit')


let currentStep = 1
showStep(1);
showButton('next');



next.addEventListener('click', () => {
    currentStep += 1;
    showStep(currentStep);
    showButtonLogic();
});

prev.addEventListener('click', () => {
    currentStep -= 1;
    showStep(currentStep);
    showButtonLogic();
})



$("#progressbar").progressbar();
$("#wizard_container").wizard({
    afterSelect: function(event, state) {
        let completed = 0;

        if (currentStep === 2) {
            completed = 50;
        }
        if (currentStep === 3) {
            completed = 100;
        }

        $("#progressbar").progressbar("value", completed);
        // $("#progressbar").progressbar("value", state.percentComplete);
        $("#location").text("" + state.stepsComplete + " of " + state.stepsPossible + " completed");

        console.log(state);
    }
});

function showStep(step) {
    switch (step) {
        case 1:
            stepDiv1.style.display = 'block';
            stepDiv2.style.display = 'none';
            stepDiv3.style.display = 'none';
            break;
        case 2:
            stepDiv1.style.display = 'none';
            stepDiv2.style.display = 'block';
            stepDiv3.style.display = 'none';
            break;
        case 3:
            stepDiv1.style.display = 'none';
            stepDiv2.style.display = 'none';
            stepDiv3.style.display = 'block';
            break;
    }
}


function showButton(which) {
    if (which === 'submit') {
        prev.style.display = 'block';
        next.style.display = 'none';
        submit.style.display = 'block';
    }

    if (which === 'next') {
        prev.style.display = 'none';
        next.style.display = 'block';
        submit.style.display = 'none';
    }

    if (which === 'other') {
        prev.style.display = 'block';
        next.style.display = 'block';
        submit.style.display = 'none';
    }
}

function showButtonLogic() {
    if (currentStep === 1) {
        showButton('next')
    }
    if (currentStep === 2) {
        showButton('other')
    }
    if (currentStep === 3) {
        showButton('submit');
    }
}
