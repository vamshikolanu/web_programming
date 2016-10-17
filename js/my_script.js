/**
 * validates if a string is email or not.
 *
 * @param      {string}  email   string which has to be validated
 * @return     {boolean} 
 */
function check_email(email) {
    var pattern = new RegExp("^[_A-Za-z0-9-]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$");
    var result = pattern .test(email);
    return result;
}

/**
 * checks the length of the input box string and prints errors if it doesn't match
 *
 * @param      {object}   _this   The jquery object
 * @param      {number}   length  The max length of the string
 * @param      {string}   string  The string
 * @return     {boolean}  
 */
function check_length(_this, length, string) {

	var value = _this.val();
    if(value.length >= length) {
    	if(_this.siblings('.text-danger').length != 0) {
    		_this.siblings('.text-danger').hide();
    	}
        return true;
    }
    
    if(_this.siblings('.text-danger').length == 0) {
    	_this.after('<p style="margin-top:5px;" class="text-danger">' + string+ '</p>');
    }

    return false;
}

/**
 * Gets the current date.
 *
 * @return {string}  The current date.
 */
function get_current_date() {
    var monthNames = [
      "Jan", "Feb", "March",
      "Apr", "May", "June", "July",
      "Aug", "Sep", "Oct",
      "Nov", "Dec"
    ];

    var date = new Date();
    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return day +'-'+monthNames[monthIndex]+'-'+year;

}

var labels = ['warning', 'danger', 'info', 'primary', 'success', 'default'];
