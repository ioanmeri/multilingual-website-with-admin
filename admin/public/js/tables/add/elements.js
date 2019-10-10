var el = {
	btn: $('#endis-ml-fields'),
	btnIcon: $('#endis-ml-fields span i'),
	mlFields: $('#ml-fields'),
	mlFieldsActiveInput: $('input[name="mlEnabled"]'),
	dateDiv: $('section.ml-checkboxes > .ml-date'),
	imgCaptionsDiv: $('section.ml-checkboxes > .ml-img-captions'),
};

var markUp = {
	date: `<input type="checkbox" name="mlDate" class="custom-control-input" id="ml-date"><label class="custom-control-label" for="ml-date">Date Added</label>`,
	captionsCheck: `<input type="checkbox" name="mlImgCaptions" class="custom-control-input" id="ml-img-captions"><label class="custom-control-label" for="ml-img-captions">Image Captions</label>`,
};
