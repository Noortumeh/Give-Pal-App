
// export const BASE_URL = "https://nourtest.bluedemo.me/api"; "http://127.0.0.1:8000/api"
export const BASE_URL = import.meta.env.VITE_BASE_URL || "https://nourtest.bluedemo.me/api";

export const getApiHeader = (lang = 'ar') => ({
  "Accept": "application/json",
  "Accept-Language": lang
});

