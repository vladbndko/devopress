import axios from 'axios';

const http = axios.create({
  baseURL: new URL('wp-json/wp/v2', window.location.origin).toString(),
});

function getFormData(body) {
  return Object.keys(body).reduce((formData, key) => {
    formData.append(key, body[key]);
    return formData;
  }, new FormData());
}

const get = async (uri, params = {}) => {
  try {
    return await http.get(uri, { params });
  } catch (error) {
    throw error;
  }
};

const post = async (uri, body = {}) => {
  try {
    return await http.post(uri, getFormData(body));
  } catch (error) {
    throw error;
  }
};

const api = {
  message: {
    send: (body) => post('message/send', body),
  },
};

export default api;
