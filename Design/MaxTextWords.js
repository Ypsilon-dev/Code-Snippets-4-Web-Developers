/*
This is a JavaScript code snippet that truncates the text content of elements with the class subtitle to a maximum number of words.
It then adds an ellipsis ('...') to the end of the string, creating a truncated text that ends with an ellipsis.

The maxWords variable is set to 13 (change it), which is the maximum number of words we want to allow for each subtitle.

The $('.subtitle').each() function loops through each element with the class subtitle.



*/
$(function() {
    
    var maxWords = 13;
    $('.subtitle').each(function() {
      var subtitle = $(this).text().trim();
      var words = subtitle.split(' ');
  
      if (words.length > maxWords) {
        var truncatedText = words.slice(0, maxWords).join(' ') + '...';
        $(this).text(truncatedText);
      }
    });
  });