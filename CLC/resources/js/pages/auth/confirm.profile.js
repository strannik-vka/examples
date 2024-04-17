import Suggestions from '../../../../../js-modules/Suggestions';
import '../../../../../js-modules/jquery.maskedinput';

let MySuggestions = new Suggestions({ token: '6f4a551cf68b71b197aee0c2593cf6bc0e95b76b' });

MySuggestions.city($('[name="city"]'));

$('[name="phone"]').mask('+7 (999) 999-99-99');
$('[name="birthday"]').mask('99.99.9999');