
export const BASE_URL = "http://127.0.0.1:8000/";


export const getApiHeader = (lang = 'ar') => ({
  "Content-Type": "application/json",
  "access-control-allow-credentials": "true",
  "Accept-Language": lang
});

