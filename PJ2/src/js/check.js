function logincheck(form0){
    if(form0.username.value==""){
        alert("用户名不能为空！");
        form0.username.focus();
        return false;
    }
    if(form0.password.value==""){
        alert("密码不能为空！");
        form0.password.focus();
        return false;
    }
    return true;
}

function registercheck(form1){
    if(form1.username.value==""){
        alert("用户名不能为空！");
        form1.username.focus();
        return false;
    }else {
        var preg = /^[\u4E00-\u9FA5\uF900-\uFA2D|\w]{2,20}$/;
        if(preg.test(form1.username.value)==false){
            alert("用户名格式不正确！ 用户名可以由2-20位的中文，英文字母，数字及下划线组成");
            form1.username.focus();
            return false;
        }
    }
    if(form1.email.value==""){
        alert("邮箱不能为空！");
        form1.email.focus();
        return false;
    }else {
        var emreg=/^\w{3,}(\.\w+)*@[A-z0-9]+(\.[A-z]{2,5}){1,2}$/;
        if(emreg.test(form1.email.value)==false){
            alert("邮箱格式不正确！");
            return false;
        }

    }
    if(form1.password.value==""){
        alert("密码不能为空！");
        form1.password.focus();
        return false;
    }else {
        var regx =/^(?!([a-zA-Z]+|\d+)$)[a-zA-Z\d]{8,20}$/;
        if(regx.test(form1.password.value)==false){
            alert("密码格式不正确！  密码需8位以上且至少包含数字和字母");
            form1.password.focus();
            return false;
        }
    }
    if(form1.repassword.value==""){
        alert("请确认密码！");
        form1.repassword.focus();
        return false;
    }
    if(form1.repassword.value!=form1.password.value){
        alert("密码不一致，请重新填写！");
        form1.repassword.focus();
        return false;
    }
    return true;
}

function uploadcheck(form2) {
    if(document.getElementById('xxx').style.display=="block"){
        alert("请选择上传的图片！");
        return false;
    }

    if(form2.title.value==""){
        alert("请填写标题！");
        form2.title.focus();
        return false;
    }
    if(form2.description.value==""){
        alert("请填写描述！");
        form2.description.focus();
        return false;
    }

    if(form2.slcontent.options[0].selected){
        alert("请选择内容类别！");
        form2.slcontent.focus();
        return false;
    }

    if(form2.country.options[0].selected){
        alert("请选择国家！");
        form2.country.focus();
        return false;
    }
    if(form2.city.options[0].selected){
        alert("请选择城市！");
        form2.city.focus();
        return false;
    }
    return true;

}
function browsecheck(form4) {
    if(form4.slcontent.options[0].selected){
        alert("请选择内容！");
        form4.slcontent.focus();
        return false;
    }
    if(form4.country.options[0].selected){
        alert("请选择国家！");
        form4.country.focus();
        return false;
    }
    if(form4.city.options[0].selected){
        alert("请选择城市！");
        form4.city.focus();
        return false;
    }
    return true;
}