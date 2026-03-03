
export const BASE_URL = "https://nourtest.bluedemo.me/api";


export const getApiHeader = (lang = 'ar') => ({
  "Accept": "application/json",
  // "Access-Control-Allow-Origin": true,
  "Accept-Language": lang
});

