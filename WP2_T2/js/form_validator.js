var fields = {};
var maxLimitDist = 0;
var maxLimitTime = 0;

$(function () {
    fields.minDist = $('#min_dist')[0];
    fields.maxDist = $('#max_dist')[0];
    maxLimitDist = $('#max_dist').attr("max");
    fields.minTime = $('#min_time')[0];
    fields.maxTime = $('#max_time')[0];
    maxLimitTime = $('#max_time').attr("max");
    fields.withGuide = $('#with_guide')[0];
})

class HikingSearchParams {
    constructor(minDist, maxDist, minTime, maxTime, withGuide) {
        this.minDist = minDist;
        this.maxDist = maxDist;
        this.minTime = minTime;
        this.maxTime = maxTime;
        this.withGuide = withGuide;
    }
}

function validateForm() {
    try {
        if (isValid()) {
            let hikingSearchParams = new HikingSearchParams(
                min_dist.value, max_dist.value, min_time.value, max_time.value, with_guide.value
            );
        } else {
            alert("Ervenytelen szuresi feltelek!");
            return false;
        }
    } catch (e) {
        alert(e);
        return false;
    }
}

function isValid() {
    let valid = true;

    if (fields.minDist.value === '') fields.minDist.value = 0;
    if (fields.maxDist.value === '') fields.maxDist.value = maxLimitDist;
    if (fields.minTime.value === '') fields.minTime.value = 0;
    if (fields.maxTime.value === '') fields.maxTime.value = maxLimitTime;

    valid &= fieldValidation(isNumberInRange, fields.minDist, null, maxLimitDist);
    valid &= fieldValidation(isNumberInRange, fields.maxDist, null, maxLimitDist);
    valid &= fieldValidation(isMinLowerThanMax, fields.minDist, fields.maxDist);
    valid &= fieldValidation(isNumberInRange, fields.minTime, null, maxLimitTime);
    valid &= fieldValidation(isNumberInRange, fields.maxTime, null, maxLimitTime);
    valid &= fieldValidation(isMinLowerThanMax, fields.minTime, fields.maxTime);
    valid &= fieldValidation(isYesNoEither, fields.withGuide);

    return valid;
}

function fieldValidation(validationFunction, field, field2 = null, limit = 0) {
    if (field == null) return false;

    let isFieldValid;
    if (!(limit === 0) && (field2 === null)) {
        isFieldValid = validationFunction(field.value, limit)
    } else if (!(field2 === null)) {
        isFieldValid = validationFunction(field.value, field2.value)
    } else {
        isFieldValid = validationFunction(field.value)
    }

    if (!isFieldValid) {
        field.className = 'placeholderRed';
        field.focus();
    } else {
        field.className = '';
    }

    return isFieldValid;
}

function isNumberInRange(value, limit) {
    const parsedVal = parseInt(value, 10);
    const parsedLim = parseInt(limit, 10);
    if (isNaN(parsedVal) || isNaN(parsedLim)) return false;
    return !(parsedVal < 0 || parsedVal > parsedLim);
}

function isMinLowerThanMax(minValue, maxValue) {
    return minValue <= maxValue;
}

function isYesNoEither(value) {
    return value === 'guide_yes' || value === 'guide_no' || value === 'either';
}
