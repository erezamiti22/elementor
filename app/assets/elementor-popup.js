class ElementorPopup {

  constructor(overlay) {
    this.overlay = overlay
    this.visible = false
    this.content = {}
  }

  open() {
    this.overlay.classList.remove('is-hidden');
    if(!Object.keys(this.content).length){
      const url = '../api/content';
      fetch(url)
          .then(response => response.json())
          .then(data => {
            this.content = data.data
            this.insertTextElement('h4', this.content.subHeader);
            this.insertTextElement('h1', this.content.header);
            this.insertTextElement('p', this.content.content);
          });
    }
  }

  close() {
    this.overlay.classList.add('is-hidden');
  }

  toggle(){
    this.visible ? this.close() : this.open();
    this.visible = !this.visible;
  }

  setToggleElement(element){
    element.addEventListener('click', () => this.toggle())
  }

  insertTextElement(elementTag, text){
    const popup = this.overlay.querySelector('section.content');
    const element = document.createElement(elementTag);
    element.innerText = text;
    popup.appendChild(element)
  }
}

export default ElementorPopup