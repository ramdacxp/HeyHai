// fake and real uris
export const FAKE_API_URL = `${import.meta.env.BASE_URL}api/sampledata.json`;
export const PROD_API_URL = `${import.meta.env.SITE}${import.meta.env.BASE_URL}api/jokes`;

// choose based on environment (dev: npm run dev, prod: npm run build)
export const ISPROD = import.meta.env.MODE === "production";
export const API_URL = ISPROD ? PROD_API_URL : FAKE_API_URL;
