window.onload = () => {
    let values = findValues();
    doChecked(values);
    let input = document.getElementById('hidden');
    input.addEventListener('keyup', () => {
        let values = findValues();
        doChecked(values);
    });
}

function insertValueIntoElement(text, elementID) {
    let resultElement = document.getElementById(elementID);
    resultElement.value = text;
};

function insertDataIntoElement(text, element) {
    let resultElement = document.querySelector(element);
    resultElement.innerHTML = text;
};

function checkedValueFinder() {
    let array = [];
    let checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
    for (let i = 0; i < checkboxes.length; i++) {
        array.push(checkboxes[i].value)
    }
    inputValueChanger(array);
}
function inputValueChanger(array) {
    let zero = array.includes("0");
    let sum = 0;
    if (zero && array.length > 1) {
        let chbox = document.querySelectorAll('input[type=checkbox]');
        for (let i = 0; i < chbox.length; i++) {
            chbox[i].checked = false;
            if (chbox[i].value == 0) {
                chbox[i].checked = true;
            }
        }
    } else {
        for (let i = 0; i < array.length; i++) {
            sum += Number(array[i]);
        }
    };
    insertValueIntoElement(sum, 'hidden');
}

function findValues() {
    let chbox = document.querySelectorAll('input[type=checkbox]')
    let chboxArray = [];
    for (let i = 0; i < chbox.length; i++) {
        chboxArray.push(chbox[i].value)
    }
    let a = Math.max.apply(null, chboxArray);
    let input = document.getElementById('hidden').value;
    valuesArray = [];
    if (input == "0") {
        valuesArray.push(0);
    } else {
        for (let i = 0; i < chbox.length; i++) {
            let result = 0;
            result = input - a;
            if (result >= 0) {
                valuesArray.push(a);
                input = result;
            }
            if (a != 1) {
                a = a / 2;
            } else {
                a = 1;
            }
        }
    }

    if (unique(valuesArray)) {
        return valuesArray;
    } else {
        insertDataIntoElement('Введено неверное значение', '.value-input-text');
    }
}

function unique(arr) {
    let resultArr = [];
    let result = false;
    for (let str of arr) {
        if (!resultArr.includes(str)) {
            resultArr.push(str);
            result = true;
        } else {
            result = false;
            break;
        }
    }

    return result;
}

function doChecked(values) {
    let chbox = document.querySelectorAll('input[type=checkbox]');
    for (let i = 0; i < chbox.length; i++) {
        chbox[i].checked = false;
    }
    for (let i = 0; i < chbox.length; i++) {
        if (values.includes(Number(chbox[i].value))) {
            chbox[i].checked = true;
        }
    }
}