export function debounce(func, timeout = 300) {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      func.apply(this, args);
    }, timeout);
  };
}
export function runFunctionsOnDOMContentLoaded(functionsArray) {
  function runFunctions() {
    for (let func of functionsArray) {
      func(); // Call each function directly
    }
  }
  window.addEventListener("DOMContentLoaded",runFunctions)
}
