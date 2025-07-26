import './bootstrap';
import Alpine from 'alpinejs';
import { handleFileSelect, removeImage } from './Helpers/handleFileSelect';
import { resetErrors, showErrors } from './Helpers/errorMessages';
import { submitFormData } from './Helpers/submitFormData';
import { deleteResource } from './Helpers/deleteResource';
import { setupEditModalHandlers } from './Helpers/setupEditModalHandlers';
import { apiFetch } from './Helpers/apiFetch';
import { acceptStatusSolicitud, rejectStatusSolicitud } from './Helpers/apiSolicitudes';
import { addTag, showTags, updateHiddenInput } from './Helpers/manageTags';
import { loadPreviewImgs } from './Helpers/loadPreviewImgs';
import { colorOptions } from './Helpers/colorOptions';

window.manageImages = { handleFileSelect, removeImage };
window.errorMessages = { showErrors, resetErrors };
window.submitFormData = submitFormData;
window.deleteResource = deleteResource;
window.setupEditModalHandlers = setupEditModalHandlers;
window.apiFetch = apiFetch;
window.apiSolicitudes = { acceptStatusSolicitud, rejectStatusSolicitud};
window.loadPreviewImgs = loadPreviewImgs;
window.manageTags = {showTags, updateHiddenInput, addTag};
window.colorOptions = colorOptions;

window.Alpine = Alpine;
Alpine.start();
