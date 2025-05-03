# Overview
This branch was created to show how all the components can be implemented.

<br>

### Component Props (Properties)
Components can have props, in basics props are inputs that can be passed into components.

<br>

# Components
Here is a list below of all components, and how to use each, as well as the props that each have available.

<br>

## Alert
Alerts provide feedback based on a previous action within an interface.

### Usage
Include `include "alert.inc"` at the top of the php page.

```php
createAlert(AlertType, message)
```
<br>

`AlertType` is an enum and can be the following: 
1. `AlertType::Success`
   
2. `AlertType::Info`
   
3. `AlertType::Warning`
   
4. `AlertType::Danger`

<br>

`message` is a string.

<br>

---

<br>

## Avatar
An avatar is a graphical illustration of a user, or multiple users within an interface.

### Usage
Include `include "avatar.inc"` at the top of the php page.

```php
createAvatar(AvatarSize, name, menuOptions)
```

<br>

`AvatarSize` is an enum and can be the following:
1. `AvatarSize::Small`
   
2. `AvatarSize::Normal`
   
3. `AvatarSize::Large`

<br>

`name` is a string, if a name is not passed in it will just have the avatar only.

<br>

`menuOptions` is an key-value pair array, where the key is an icon path, and the value is the text, here is an example:
 
```php
array(
    "/icons/sign-out.svg" => "Sign out",
    "/icons/arrows.svg" => "Switch account",
    "/icons/profile.svg" => "View profile"
    ...
)
```

###### Please note that if there is no array specified, or there is an empty array declared no menu will be displayed.

<br>

---

<br>

## Badge 
Badges are used to display statuses, notifications or other information that needs to stand out.

### Usage 
Include `include "badge.inc"` at the top of the php page.

```php
createBadge(BadgeSize, icon, Colour, message)
```

<br>

`BadgeSize` is an enum and can be the following:
1. `BadgeSize::Small`
   
2. `BadgeSize::Normal`
   
3. `BadgeSize::Large`

<br>

`icon` is a string, if no string is provided there will be no icon.

<br>

`BadgeColour` is an enum and can be the following:
1. `BadgeColour::Grey`
   
2. `BadgeColour::Red`
   
3. `BadgeColour::Green`
   
4. `BadgeColour::Amber`
   
5. `BadgeColour::Blue`
   
6. `BadgeColour::Purple`
   
7. `BadgeColour::Pink`
   
8. `BadgeColour::Teal`
   
9.  `BadgeColour::Brown`
    
10. `BadgeColour::Orange`

<br>

`message` is a string, badges must have a message.

<br>

---

<br>

## Button
Buttons are graphical component that give users a clickable area.

### Usage 
Include `include "badge.inc"` at the top of the php page.

```php
createButton(ButtonSize, ButtonType, ButtonColour, icon, message)
```

<br>

`ButtonSize` is an enum and can be the following:
1. `ButtonSize::Small`
   
2. `ButtonSize::Normal`
   
3. `ButtonSize::Large`

<br>

`ButtonType` is an enum and can be the following:
1. `ButtonType::Filled`
   
2. `ButtonType::Shaded`
   
3. `ButtonType::Plain`
   
4. `ButtonType::Warning`
   
5. `ButtonType::Danger`

<br>

`ButtonColour` is an enum and can be the following:
1. `ButtonColour::Grey`
   
2. `ButtonColour::Red`
   
3. `ButtonColour::Green`
   
4. `ButtonColour::Amber`
   
5. `ButtonColour::Blue`
   
6. `ButtonColour::Purple`
   
7. `ButtonColour::Pink`
   
8. `ButtonColour::Teal`
   
9.  `ButtonColour::Brown`
    
10. `ButtonColour::Orange`

<br>

`icon` is a string, if no icon is provided the icon will not be displayed

<br>

`message` is a string, buttons must have messages

<br>

---

<br>

## Card (WIP)
DESCRIPTION

### Usage 
Include `include "card.inc"` at the top of the php page.

```php
createCard()
```

<br>

---

<br>

## Footer
Buttons are graphical component that give users a clickable area.

### Usage 
Include `require "footer.inc"` at the top of the php page.

```php
createFooter()
```
######  Note that when you use the footer component make sure to add it within the html and body elements, the footer does not come with ending html/body tags.

<br>

---

<br>

## Topbar (Header)
The topbar is one of the main sources of navigation throughout interfaces.

### Usage 
Include `require "topbar.inc"` at the top of the php page.

```php
createTopbar(TopbarType, menuOptions)
```

<br>

`TopbarType` is an enum and can be the following:
1. `TopbarType::Singular` - The main navigation for websites.
   
2. `TopbarType::Seperated` - The main navigation for web applications.

<br>

`menuOptions` is an key-value pair array, where the key is an icon path, and the value is the text, here is an example:
 
```php
array(
    "/icons/jobs.svg" => "Jobs",
    "/icons/person-run.svg" => "Apply",
    "/icons/face-smile.svg" => "About"
    ...
)
```

<br>

---

<br>

## Input
Input is a simple text box containing minimal characters.

### Usage 
Include `include "input.inc"` at the top of the php page.

```php
createInput(type, name, maxLength, size, placeholder, pattern, isRequired, disabled, maxLength)
```

<br>

All of these props above act the same as any regular input field prop.

<br>