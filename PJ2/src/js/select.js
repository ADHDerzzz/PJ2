
// var country  = document.getElementById("country");
// var city = document.getElementById("city");
//
// for (var i in cities){
//     var option_country = document.createElement("option");
//     var textNode = document.createTextNode(cities[i]);
//     option_country.appendChild(textNode);
//     country.appendChild(option_country);
// }
// for(var j=0;j<cities.length;j++){
//     var option_country = document.createElement("option");
//     var textNode = document.createTextNode(cities[j]);
//     option_country.appendChild(textNode);
//     country.appendChild(option_country);
// }
// function set_city(self)
// {
//     var choice = (self.options[self.selectedIndex]).innerHTML;
//     var options = city.children;
//     for (var k=0; k<options.length; k++){
//         city.removeChild(options[k--]);
//     }
//     for (var i in cities[choice]){
//         var option_city = document.createElement("option");
//         option_city.innerHTML = cities[choice][i];
//         city.appendChild(option_city);
//     }
//
// }
function set_city(country, city)
{
    var con;
    var i, ii;

    con=country.value;

    city.length=1;

    if(con=='0') return;
    if(typeof(cities[con])=='undefined') return;

    for(i=0; i<cities[con].length; i++)
    {
        ii = i+1;
        city.options[ii] = new Option();
        city.options[ii].text = cities[con][i];
        city.options[ii].value = cities[con][i];
    }
}