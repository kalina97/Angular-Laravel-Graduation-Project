import { Component, OnInit } from "@angular/core";
import { TestService } from "../test.service";

@Component({
  selector: "app-test",
  templateUrl: "./test.component.html",
  styleUrls: ["./test.component.scss"]
})
export class TestComponent implements OnInit {
  constructor(public test: TestService) {}

  ngOnInit() {
    this.test.test().subscribe(res => {
     console.log(res);
    });
  }
}
