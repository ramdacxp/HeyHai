import { API_URL } from './constants.js';

export async function fetchData(endpoint: string) {
  const apiEndpoint = `${API_URL}${endpoint}`;
  console.info(`Fetching ${apiEndpoint}…`);
  // return fetch(apiEndpoint)
  // 	.then(
  // 		(r) =>
  // 			r.json() as unknown as Promise<
  // 				ReturnType<EndpointsToOperations[Selected]>
  // 			>,
  // 	)
  // 	.catch((e) => {
  // 		console.error(e);
  // 		throw Error('Invalid API data!');
  // 	});
}

// NOTE: These helpers are useful for unifying paths, app-wide
export function url(path = '') {
  return `${import.meta.env.SITE}${import.meta.env.BASE_URL}${path}`;
}