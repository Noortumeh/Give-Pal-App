
export const BASE_URL = "api.nourtest.bluedemo.me/api"; //"http://127.0.0.1:8000/api";


export const getApiHeader = (lang = 'ar') => ({
  "Accept": "application/json",
  // "Access-Control-Allow-Origin": true,
  "Accept-Language": lang
});

