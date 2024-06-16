import "./bootstrap";

// We've moved the images to the 'resources' directory instead of 'public'.
// This change allows Vite to handle the images, providing benefits like versioning and cache busting.
// Utilizing 'import.meta.glob' ensures that all images in the specified path are processed efficiently.
import.meta.glob(["../images/*"]);
