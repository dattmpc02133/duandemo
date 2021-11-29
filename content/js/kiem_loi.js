// kiểm lỗi form
function kiem_loi_form(options) {
    // kiểm lỗi form
    function loi_form_onblur(inputElement, rule) {
        var erroElement = inputElement.parentElement.querySelector(".mess");
        var mess = rule.test(inputElement.value);
        if (mess) {
            erroElement.innerText = mess;
            inputElement.parentElement.classList.add("box__error");
        } else {
            erroElement.innerText = ""
            inputElement.parentElement.classList.remove("box__error");
        }
    }
    var formElement = document.querySelector(options.form);
    if (formElement) {
        options.rules.forEach(function (rule) {
            var inputElement = formElement.querySelector(rule.selector);
            if (inputElement) {
                // khi blur
                inputElement.onblur = function () {
                    loi_form_onblur(inputElement, rule);
                }
                // khi nhập dữ liệu
                inputElement.oninput = function () {
                    var erroElement = inputElement.parentElement.querySelector(".mess");
                    erroElement.innerText = "";
                    inputElement.parentElement.classList.remove("box__error");
                }
            }
        })
    }
}
// bắt buộc nhập 
kiem_loi_form.isRequiRed = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : "Vui lòng nhập trường này";
        }
    }
}
kiem_loi_form.isEmail = function (selector) {

    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : "Trường này phải đúng định dạng email, ví dụ: duanmau@gmail.com";
        }
    }
}
// nhập tối thiếu ký tự
kiem_loi_form.minLength = function (selector, min) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : `Vui lòng nhập tối thiểu ${min} ký tự`;
        }
    }
}

// xác nhận mật khẩu 
kiem_loi_form.confirm = function (selector, getConfirm, errorMess) {
    return {
        selector: selector,
        test: function (value) {
            return value === getConfirm() ? undefined : errorMess || "Giá trị xác nhận không chính xác";
        }
    }
}