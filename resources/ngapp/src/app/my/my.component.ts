import { Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';
import axios from 'axios';

@Component({
  selector: 'app-my',
  templateUrl: './my.component.html',
  styleUrls: ['./my.component.css']
})
export class MyComponent implements OnInit {

  message:string;
  input:FormControl;

  constructor() { }

  ngOnInit(): void {
    this.message = 'please input your name:';
    this.input = new FormControl('noname');
  }

  doAction() {
    axios.get(`/hello/json/${this.input.value}`).then(response => {
      const person = response.data;
      const msg = `${person.id}:${person.name} [${person.mail}] (${person.age})`;
      this.message = msg;
  });
  }
}
